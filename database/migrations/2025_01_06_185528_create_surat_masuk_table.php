<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('pengirim');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}

