<?php

namespace App\Http\Controllers;

use App\Models\Kosakata;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DialogflowController extends Controller
{
    /**
     * Menangani semua request webhook dari Dialogflow CX.
     */
    public function handleWebhook(Request $request)
    {
        // Log seluruh request untuk debugging
        Log::info('Dialogflow CX Request: ' . json_encode($request->all()));

        // Ambil tag dari fulfillmentInfo untuk routing
        $tag = $request->input('fulfillmentInfo.tag');
        Log::info('TAG DITERIMA: ' . var_export($tag, true));

        // Gunakan switch case untuk memanggil method yang sesuai berdasarkan tag
        switch ($tag) {
            // --- Terjemahan dari Jawa ke Indonesia ---
            case 'jawa_indo':
                Log::info('Masuk case: jawa_indo (Kamus)');
                return $this->handleCariArtiKata($request);

            case 'kalimat_jawa':
                Log::info('Masuk case: kalimat_jawa (Translate API)');
                return $this->handleTerjemahkanKalimat($request);

            // --- Terjemahan dari Indonesia ke Jawa (Fungsionalitas Baru) ---
            case 'indo_jawa':
                Log::info('Masuk case: indo_jawa (Kamus)');
                return $this->handleCariKataJawa($request);

            case 'kalimat_indo':
                Log::info('Masuk case: kalimat_indo (Translate API)');
                return $this->handleTerjemahkanKeJawa($request);

            default:
                Log::warning('Tag tidak dikenali: ' . var_export($tag, true));
                return $this->createWebhookResponse('Maaf, saya tidak mengerti perintah tersebut.');
        }
    }

    /**
     * [Jawa -> Indonesia] Menangani pencarian arti untuk satu kata dari database.
     */
    private function handleCariArtiKata(Request $request)
    {
        $params = $request->input('intentInfo.parameters');
        $kataJawa = $params['kata_jawa']['resolvedValue'] ?? null;
        if (is_array($kataJawa)) {
            $kataJawa = $kataJawa[0] ?? null;
        }

        if (!$kataJawa) {
            Log::warning('Parameter "kata_jawa" tidak ditemukan untuk tag "jawa_indo".');
            return $this->createWebhookResponse('Maaf, kata apa yang ingin Anda cari artinya?');
        }

        // Cari kata di database
        $kosakata = Kosakata::where('kata_jawa', $kataJawa)->first();

        if ($kosakata) {
            $arti = $kosakata->kata_indonesia;
            $responseText = "Arti dari \"$kataJawa\" adalah \"$arti\".";
        } else {
            $responseText = "Maaf, arti kata \"$kataJawa\" tidak ditemukan dalam kamus kami.";
        }

        Log::info('Respons untuk jawa_indo: ' . $responseText);
        return $this->createWebhookResponse($responseText);
    }

    /**
     * [Jawa -> Indonesia] Menangani terjemahan kalimat menggunakan Google Translate API.
     */
    private function handleTerjemahkanKalimat(Request $request)
    {
        $params = $request->input('intentInfo.parameters');
        $kalimatJawa = $params['kalimat_jawa']['resolvedValue'] ?? null;

        if (!$kalimatJawa) {
            Log::warning('Parameter "kalimat_jawa" tidak ditemukan untuk tag "kalimat_jawa".');
            return $this->createWebhookResponse('Maaf, kalimat apa yang ingin Anda terjemahkan?');
        }

        return $this->translateText($kalimatJawa, 'jw', 'id');
    }

    /**
     * [Indonesia -> Jawa] Menangani pencarian padanan kata dari database.
     */
    private function handleCariKataJawa(Request $request)
    {
        $params = $request->input('intentInfo.parameters');
        $kataIndonesia = $params['kata_indonesia']['resolvedValue'] ?? null;
        if (is_array($kataIndonesia)) {
            $kataIndonesia = $kataIndonesia[0] ?? null;
        }

        if (!$kataIndonesia) {
            Log::warning('Parameter "kata_indonesia" tidak ditemukan untuk tag "indo_jawa".');
            return $this->createWebhookResponse('Maaf, kata apa yang ingin Anda cari padanannya dalam bahasa Jawa?');
        }

        // Cari kata di database
        $kosakata = Kosakata::where('kata_indonesia', $kataIndonesia)->first();

        if ($kosakata) {
            $kataJawa = $kosakata->kata_jawa;
            $responseText = "Dalam bahasa Jawa, \"$kataIndonesia\" adalah \"$kataJawa\".";
        } else {
            $responseText = "Maaf, padanan kata untuk \"$kataIndonesia\" tidak ditemukan dalam kamus kami.";
        }

        Log::info('Respons untuk indo_jawa: ' . $responseText);
        return $this->createWebhookResponse($responseText);
    }

    /**
     * [Indonesia -> Jawa] Menangani terjemahan kalimat menggunakan Google Translate API.
     */
    private function handleTerjemahkanKeJawa(Request $request)
    {
        $params = $request->input('intentInfo.parameters');
        $kalimatIndonesia = $params['kalimat_indonesia']['resolvedValue'] ?? null;

        if (!$kalimatIndonesia) {
            Log::warning('Parameter "kalimat_indonesia" tidak ditemukan untuk tag "kalimat_indo".');
            return $this->createWebhookResponse('Maaf, kalimat apa yang ingin Anda terjemahkan?');
        }

        return $this->translateText($kalimatIndonesia, 'id', 'jw');
    }

    /**
     * Fungsi terpusat untuk memanggil Google Translate API.
     *
     * @param string $textToTranslate Teks yang akan diterjemahkan.
     * @param string $sourceLang Kode bahasa sumber (e.g., 'id', 'jw').
     * @param string $targetLang Kode bahasa tujuan (e.g., 'id', 'jw').
     * @return \Illuminate\Http\JsonResponse
     */
    private function translateText(string $textToTranslate, string $sourceLang, string $targetLang)
    {
        try {
            // Inisialisasi Google Translate client
            $translate = new TranslateClient(['key' => env('GOOGLE_CLOUD_API_KEY')]);

            // Terjemahkan teks
            $result = $translate->translate($textToTranslate, [
                'source' => $sourceLang,
                'target' => $targetLang
            ]);

            $terjemahan = $result['text'];
            $responseText = "Terjemahannya adalah:\n\"$terjemahan\"";

            Log::info("Respons terjemahan ($sourceLang -> $targetLang): " . $responseText);
            return $this->createWebhookResponse($responseText);

        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah dengan API
            Log::error('Google Translate API error: ' . $e->getMessage());
            return $this->createWebhookResponse('Maaf, terjadi kesalahan saat mencoba menerjemahkan kalimat.');
        }
    }

    /**
     * Helper function untuk membuat struktur respons JSON yang benar untuk Dialogflow CX.
     */
    private function createWebhookResponse(string $text): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'fulfillmentResponse' => [
                'messages' => [
                    [
                        'text' => [
                            'text' => [$text] // Respons harus dalam bentuk array of strings
                        ]
                    ]
                ]
            ]
        ]);
    }
}