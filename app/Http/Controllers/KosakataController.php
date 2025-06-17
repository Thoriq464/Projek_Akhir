<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kosakata;

class KosakataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosakata = Kosakata::all();
        $jumlahKosakata = Kosakata::count(); // Menghitung jumlah kosakata
        return view('admin.dashboard', compact('kosakata', 'jumlahKosakata')); // Mengirim data kosakata ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kosakata.create'); // Menampilkan form untuk menambah kosakata
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ //Validasi data yang diinputkan
            'kata_jawa' => 'required|string|max:255', 
            'kata_indonesia' => 'required|string|max:255',
            'contoh_kalimat' => 'nullable|string',
            'contoh_kalimat_id' => 'nullable|string',
            'jenis_kata' => 'nullable|string|max:100',
        ]);

        Kosakata::create($request->only(['kata_jawa','kata_indonesia','contoh_kalimat','contoh_kalimat_id','jenis_kata'])); // Membuat kosakata baru dengan input dari user

        return redirect()->route('dashboard.index')->with('success', 'Kosakata berhasil ditambahkan!'); // Menampilkan Pesan sukses
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kosakata = Kosakata::FindOrFail($id);
        return view('admin.kosakata.edit', compact('kosakata')); // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kosakata $dashboard)
    {
        $kosakata = $dashboard;
        $request->validate([
            'kata_jawa' => 'required|string|max:255',
            'kata_indonesia' => 'required|string|max:255',
            'contoh_kalimat' => 'nullable|string',
            'contoh_kalimat_id' => 'nullable|string',
            'jenis_kata' => 'nullable|string|max:100',
        ]);

        $kosakata->update($request->only(['kata_jawa','kata_indonesia','contoh_kalimat','contoh_kalimat_id','jenis_kata'])); // Mengupdate kosakata dengan input dari user
        return redirect()->route('dashboard.index')->with('success', 'Kosakata berhasil diperbarui!'); // Menampilkan Pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kosakata $dashboard)
    {
        $kosakata = $dashboard;
        $kosakata->delete(); // Menghapus kosakata
        return redirect()->route('dashboard.index')->with('success', 'Kosakata berhasil dihapus!'); // Menampilkan Pesan sukses
    }

    /**
     * Show the form for importing CSV.
     */
    public function importForm()
    {
        return view('admin.kosakata.import');
    }

    /**
     * Import kosakata dari file CSV (halaman admin).
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
            Kosakata::create([
                'kata_jawa' => $data['kata_jawa'] ?? null,
                'kata_indonesia' => $data['kata_indonesia'] ?? null,
                'contoh_kalimat' => $data['contoh_kalimat'] ?? null,
                'contoh_kalimat_id' => $data['contoh_kalimat_id'] ?? null,
                'jenis_kata' => $data['jenis_kata'] ?? null,
            ]);
        }
        fclose($handle);
        return redirect()->route('dashboard.index')->with('success', 'Import CSV berhasil!');
    }
}
