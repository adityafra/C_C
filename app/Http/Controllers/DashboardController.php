<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 data terbaru dari tabel surat_masuk
        $suratMasuk = DB::table('surat_masuk')
            ->orderBy('tanggal_surat', 'desc')
            ->take(5)
            ->get();

        // Ambil 5 data terbaru dari tabel surat_keluar
        $suratKeluar = DB::table('surat_keluar')
            ->orderBy('tanggal_surat', 'desc')
            ->take(5)
            ->get();

        // Kirim data ke view
        return view('dashboard', compact('suratMasuk', 'suratKeluar'));
    }
}
