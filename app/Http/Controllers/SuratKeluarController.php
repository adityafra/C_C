<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('surat-keluar.index', compact('suratKeluar'));
    }
    // 202253084
    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|mimes:pdf,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('surat-keluar');
        }

        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan.');
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|mimes:pdf,docx|max:2048',
        ]);

        $filePath = $suratKeluar->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::delete($filePath);
            }
            $filePath = $request->file('file')->store('surat_keluar');
        }

        $suratKeluar->update([
            'nomor_surat' => $request->nomor_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->file_path) {
            Storage::delete($suratKeluar->file_path);
        }
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus.');
    }

    public function download(SuratKeluar $suratKeluar)
    {
        // Pastikan file path ada dan file tersebut ada di storage
        if ($suratKeluar->file_path && Storage::exists($suratKeluar->file_path)) {
            // Mengembalikan file untuk diunduh
            return Storage::download($suratKeluar->file_path);
        } else {
            // Jika file tidak ditemukan, tampilkan pesan error atau redirect
            return redirect()->route('surat-keluar.index')->with('error', 'File tidak ditemukan.');
        }
    }
}
