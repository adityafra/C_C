<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel surat_masuk
        $suratMasuk = SuratMasuk::all();
        // Mengembalikan view surat-masuk.index dengan data suratMasuk.
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'nullable|string|max:255',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('surat_masuk');
        }

        SuratMasuk::create([
            'nomor_surat' => $request->nomor_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'nullable|string|max:255',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,docx|max:2048',
        ]);

        $filePath = $suratMasuk->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::delete($filePath);
            }
            // Menyimpan file yang diunggah ke direktori surat_masuk.
            $filePath = $request->file('file')->store('surat_masuk');
        }

        $suratMasuk->update([
            'nomor_surat' => $request->nomor_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil diperbarui.');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($suratMasuk->file_path) {
            Storage::delete($suratMasuk->file_path);
        }

        $suratMasuk->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil dihapus.');
    }
// 202253084
    public function download(SuratMasuk $suratMasuk)
    {
        // Cek apakah file ada di storage
        if ($suratMasuk->file_path && Storage::exists($suratMasuk->file_path)) {
            // Mengembalikan file untuk diunduh
            return Storage::download($suratMasuk->file_path);
        } else {
            // Jika file tidak ditemukan, tampilkan pesan error atau redirect
            return redirect()->route('surat-masuk.index')->with('error', 'File tidak ditemukan.');
        }
    }
}
