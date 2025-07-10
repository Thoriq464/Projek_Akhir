<?php

namespace App\Http\Controllers;

use App\Models\Kosakata;
use Google\Cloud\Dialogflow\Cx\V3\Client\SessionsClient;
use Google\Cloud\Dialogflow\Cx\V3\DetectIntentRequest;
use Google\Cloud\Dialogflow\Cx\V3\QueryInput;
use Google\Cloud\Dialogflow\Cx\V3\TextInput;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class DialogflowController extends Controller
{
    /**
     * [ENDPOINT UTAMA] Menerima request dari aplikasi Flutter.
     * Ini adalah satu-satunya method yang perlu Anda definisikan di route Anda.
     */
    public function handleFlutterRequest(Request $request): JsonResponse
    {
        Log::info('Permintaan dari Flutter: ' . json_encode($request->all()));

        $pesanDariFlutter = $request->input('text');
        $sessionId = $request->input('session_id', 'default-session-' . uniqid());

        if (!$pesanDariFlutter) {
            return response()->json(['error' => 'Teks pesan tidak ditemukan'], 400);
        }

        // Panggil Dialogflow CX dari backend
        $dialogflowResponse = $this->callDialogflowCX($pesanDariFlutter, $sessionId);

        // [PERBAIKAN] Gunakan NAMA INTENT untuk routing, bukan TAG
        $intentName = $dialogflowResponse['match']['intent']['displayName'] ?? null;
        Log::info('INTENT DITERIMA: ' . var_export($intentName, true));

        // Sekarang, switch case berdasarkan nama intent
        switch ($intentName) {
            case 'Apa_arti':
                Log::info('Masuk case: Apa_arti (Kamus)');
                return $this->handleCariArtiKata($dialogflowResponse);

            case 'Kata_indo':
                Log::info('Masuk case: Terjemahkan_Kata_Indo_Ke_Jawa (Kamus)');
                return $this->handleCariKataJawa($dialogflowResponse);

            case 'Kalimat_terjemahan':
                Log::info('Masuk case: Kalimat_terjemahan (Database)');
                return $this->handleTerjemahkanKalimat($dialogflowResponse);
                
            case 'Kalimat_indo':
                Log::info('Masuk case: Kalimat_indo_ke_jawa (Database)');
                return $this->handleTerjemahkanKeJawa($dialogflowResponse);

            default:
                Log::warning('Intent tidak dikenali atau tidak ada: ' . var_export($intentName, true));
                return $this->passThroughResponse($dialogflowResponse);
        }
    }

    /**
     * [INTERNAL] Berkomunikasi dengan Dialogflow CX API.
     */
    private function callDialogflowCX(string $text, string $sessionId): array
    {
        try {
            $credentialsPath = env('GOOGLE_APPLICATION_CREDENTIALS');
            if (!$credentialsPath || !file_exists($credentialsPath)) {
                throw new \Exception("File kredensial Google tidak ditemukan. Pastikan GOOGLE_APPLICATION_CREDENTIALS di .env sudah benar.");
            }
            $credentialsArray = json_decode(file_get_contents($credentialsPath), true);
            
            $locationId = env('DIALOGFLOW_LOCATION_ID');
            $sessionsClient = new SessionsClient([
                'credentials' => $credentialsArray,
                'apiEndpoint' => $locationId . '-dialogflow.googleapis.com'
            ]);

            $sessionName = $sessionsClient->sessionName(
                env('DIALOGFLOW_PROJECT_ID'),
                $locationId,
                env('DIALOGFLOW_AGENT_ID'),
                $sessionId
            );

            $textInput = new TextInput(['text' => $text]);
            $queryInput = new QueryInput(['text' => $textInput, 'language_code' => 'id']);
            
            $request = new DetectIntentRequest();
            $request->setSession($sessionName);
            $request->setQueryInput($queryInput);

            $response = $sessionsClient->detectIntent($request);
            $queryResult = $response->getQueryResult();
            Log::info('Respons Mentah dari Dialogflow: ' . $queryResult->serializeToJsonString());

            $responseArray = json_decode($queryResult->serializeToJsonString(), true);
            $sessionsClient->close();
            return $responseArray;

        } catch (\Exception $e) {
            Log::error('Dialogflow CX API error: ' . $e->getMessage() . ' di file ' . $e->getFile() . ' baris ' . $e->getLine());
            return [
                'match' => ['intent' => ['displayName' => null]],
                'responseMessages' => [
                    ['text' => ['text' => ['Maaf, terjadi kesalahan pada asisten AI. Silakan coba lagi nanti.']]]
                ]
            ];
        }
    }
    
    // --- METHOD-METHOD PENANGANAN INTENT ---

    private function handleCariArtiKata(array $dialogflowResponse): JsonResponse
    {
        $params = $dialogflowResponse['parameters'] ?? [];
        $kataJawaValues = $params['kata_jawa'] ?? [];
        if (!is_array($kataJawaValues)) $kataJawaValues = [$kataJawaValues];
        
        // PERBAIKAN: Gunakan teks asli dari user jika parameter Dialogflow salah
        $originalText = $dialogflowResponse['text'] ?? '';
        
        // Extract kata yang dicari dari teks asli
        if (preg_match('/(?:apa arti|artinya|arti dari)\s+(.+?)(?:\?|$)/i', $originalText, $matches)) {
            $kataAsli = trim($matches[1]);
            Log::info("Kata asli dari user: '$kataAsli'");
            // Gunakan kata asli sebagai prioritas utama
            array_unshift($kataJawaValues, $kataAsli);
            $kataJawaValues = array_unique($kataJawaValues);
        }
        
        if (empty($kataJawaValues[0])) {
            return $this->createWebhookResponse('Maaf, kata apa yang ingin Anda cari artinya?');
        }

        $responses = [];
        foreach ($kataJawaValues as $kata) {
            $kataBersih = preg_replace('/[.,!?;:\"\'()]/', '', strtolower(trim($kata)));
            if (empty($kataBersih)) continue;
            
            Log::info("Mencari kata: '$kataBersih'");
            
            // Debug: tampilkan semua kata yang cocok
            $semuaKataDebug = Kosakata::whereRaw('LOWER(TRIM(kata_jawa)) = ?', [$kataBersih])
                                     ->get(['id', 'kata_jawa', 'kata_indonesia']);
            
            Log::info("Semua kata yang ditemukan untuk '$kataBersih': " . 
                     $semuaKataDebug->map(function($k) {
                         return "ID:{$k->id} '{$k->kata_jawa}'=>'{$k->kata_indonesia}'";
                     })->implode(', '));
            
            // Cari dengan prioritas: exact match dulu, lalu yang terpendek
            $kosakata = Kosakata::whereRaw('LOWER(TRIM(kata_jawa)) = ?', [$kataBersih])
                               ->orderByRaw("CASE WHEN kata_jawa = ? THEN 0 ELSE 1 END", [$kataBersih]) // Prioritas exact case match
                               ->orderByRaw('LENGTH(kata_jawa) ASC') // Lalu yang terpendek
                               ->orderBy('id', 'ASC') // Terakhir urutkan berdasarkan ID (yang lebih dulu ditambahkan)
                               ->first();
            
            if ($kosakata) {
                Log::info("Kata dipilih: ID:{$kosakata->id} '{$kosakata->kata_jawa}' = '{$kosakata->kata_indonesia}'");
                $responses[] = "{$kata}: {$kosakata->kata_indonesia}";
                break; // Keluar dari loop setelah menemukan kata pertama
            } else {
                Log::warning("Kata '$kataBersih' tidak ditemukan di database.");
            }
        }
        
        if (empty($responses)) {
            return $this->createWebhookResponse("Maaf, kata yang Anda cari tidak ditemukan di kamus.");
        }
        
        return $this->createWebhookResponse(implode("\n", $responses));
    }

    private function handleCariKataJawa(array $dialogflowResponse): JsonResponse
    {
        $params = $dialogflowResponse['parameters'] ?? [];
        $kataIndoValues = $params['kata_indonesia'] ?? [];
        if (!is_array($kataIndoValues)) $kataIndoValues = [$kataIndoValues];
        
        if (empty($kataIndoValues[0])) {
            return $this->createWebhookResponse('Maaf, kata apa yang ingin Anda terjemahkan ke bahasa Jawa?');
        }

        $responses = [];
        foreach ($kataIndoValues as $kata) {
            // Bersihkan tanda baca dan normalisasi ke huruf kecil
            $kataBersih = preg_replace('/[.,!?;:\"\'()]/', '', strtolower(trim($kata)));
            if (empty($kataBersih)) continue; // Lewati jika kata kosong setelah pembersihan
            $kosakata = Kosakata::whereRaw('LOWER(kata_indonesia) = ?', [$kataBersih])->first();
            if ($kosakata) {
                $responses[] = "{$kata}: {$kosakata->kata_jawa}";
            } else {
                $responses[] = "{$kata}: (tidak ditemukan di kamus)";
                Log::warning("Kata '$kataBersih' tidak ditemukan di database.");
            }
        }
        return $this->createWebhookResponse(implode("\n", $responses));
    }
    
    private function handleTerjemahkanKalimat(array $dialogflowResponse): JsonResponse
    {
        $params = $dialogflowResponse['parameters'] ?? [];
        $kalimatJawa = $params['kalimat_jawa'] ?? null;

        if (!$kalimatJawa) {
            Log::warning('Parameter "kalimat_jawa" tidak ditemukan.');
            return $this->createWebhookResponse('Maaf, kalimat apa yang ingin Anda terjemahkan?');
        }

        // Pecah kalimat menjadi array kata dan bersihkan tanda baca
        $kataJawaArray = array_filter(array_map(function ($kata) {
            return preg_replace('/[.,!?;:\"\'()]/', '', strtolower(trim($kata)));
        }, explode(' ', trim($kalimatJawa))), fn($kata) => !empty($kata));
        $terjemahan = [];

        // Cari terjemahan setiap kata di database
        foreach ($kataJawaArray as $kata) {
            $kosakata = Kosakata::whereRaw('LOWER(kata_jawa) = ?', [$kata])->first();
            if ($kosakata) {
                $terjemahan[] = $kosakata->kata_indonesia;
            } else {
                $terjemahan[] = $kata;
                Log::warning("Kata '$kata' tidak ditemukan di database.");
            }
        }

        // Susun kalimat terjemahan
        $kalimatTerjemahan = implode(' ', $terjemahan);
        $responseText = "Artinya adalah: $kalimatTerjemahan.";

        return $this->createWebhookResponse($responseText);
    }

    private function handleTerjemahkanKeJawa(array $dialogflowResponse): JsonResponse
    {
        $params = $dialogflowResponse['parameters'] ?? [];
        $kalimatIndonesia = $params['kalimat_indonesia'] ?? null;

        if (!$kalimatIndonesia) {
            Log::warning('Parameter "kalimat_indonesia" tidak ditemukan.');
            return $this->createWebhookResponse('Maaf, kalimat apa yang ingin Anda terjemahkan?');
        }

        // Pecah kalimat menjadi array kata dan bersihkan tanda baca
        $kataIndoArray = array_filter(array_map(function ($kata) {
            return preg_replace('/[.,!?;:\"\'()]/', '', strtolower(trim($kata)));
        }, explode(' ', trim($kalimatIndonesia))), fn($kata) => !empty($kata));
        $terjemahan = [];

        // Cari terjemahan setiap kata di database
        foreach ($kataIndoArray as $kata) {
            $kosakata = Kosakata::whereRaw('LOWER(kata_indonesia) = ?', [$kata])->first();
            if ($kosakata) {
                $terjemahan[] = $kosakata->kata_jawa;
            } else {
                $terjemahan[] = $kata;
                Log::warning("Kata '$kata' tidak ditemukan di database.");
            }
        }

        // Susun kalimat terjemahan
        $kalimatTerjemahan = implode(' ', $terjemahan);
        $responseText = "Terjemahannya adalah: $kalimatTerjemahan.";

        return $this->createWebhookResponse($responseText);
    }

    private function createWebhookResponse(string $text): JsonResponse
    {
        // Format respons ini harus cocok dengan yang diharapkan oleh Flutter
        return response()->json([
            'fulfillmentResponse' => [
                'messages' => [
                    [
                        'text' => [
                            'text' => [$text]
                        ]
                    ]
                ]
            ]
        ]);
    }
    
    private function passThroughResponse(array $dialogflowResponse): JsonResponse
    {
        $responseText = $dialogflowResponse['responseMessages'][0]['text']['text'][0] 
                        ?? 'Maaf, saya tidak mengerti maksud Anda.';

        return $this->createWebhookResponse($responseText);
    }
}