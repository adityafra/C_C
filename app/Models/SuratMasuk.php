<?php

namespace App\Models;
// 202253043
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    
    protected $table = 'surat_masuk'; //  Nama tabel dalam database yang dihubungkan dengan model SuratMasuk.

    // Menentukan kolom-kolom mana dalam tabel surat_masuk yang dapat diisi secara mass assignment.
    protected $fillable = [
        'nomor_surat',
        'pengirim',
        'perihal',
        'tanggal_surat',
        'file_path',
    ];
}
