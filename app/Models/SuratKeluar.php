<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'surat_keluar';

    // Tentukan field yang dapat diisi (mass assignable)
    protected $fillable = [
        'nomor_surat',
        'tujuan',
        'perihal',
        'tanggal_surat',
        'file_path',
    ];

    // Tentukan field yang tidak boleh diisi
    protected $guarded = [];

    // Fungsi untuk menyimpan file jika ada
    public function setFilePathAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['file_path'] = $value;
        }
    }
}
