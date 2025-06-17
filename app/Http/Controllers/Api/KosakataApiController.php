<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kosakata;

class KosakataApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosakata = Kosakata::select(
            'id',
            'kata_jawa',
            'kata_indonesia',
            'contoh_kalimat',
            'contoh_kalimat_id',
            'jenis_kata'
        )->get(); // Mengambil semua data kosakata dari database
        return response()->json($kosakata); // Mengembalikan data kosakata dalam format JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kosakata = Kosakata::find($id);

        if ($kosakata) {
            return response()->json($kosakata); // Mengembalikan data kosakata dalam format JSON
        } else {
            return response()->json(['message' => 'Kosakata Tidak Ditemukan'], 404); // Mengembalikan pesan jika kosakata tidak ditemukan
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Import kosakata dari file CSV.
     */
    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);
            // Pastikan kolom sesuai dengan struktur tabel
            \App\Models\Kosakata::create([
                'kata_jawa' => $data['kata_jawa'] ?? null,
                'kata_indonesia' => $data['kata_indonesia'] ?? null,
                'contoh_kalimat' => $data['contoh_kalimat'] ?? null,
                'contoh_kalimat_id' => $data['contoh_kalimat_id'] ?? null,
                'jenis_kata' => $data['jenis_kata'] ?? null,
            ]);
        }
        fclose($handle);
        return response()->json(['message' => 'Import berhasil']);
    }
}
