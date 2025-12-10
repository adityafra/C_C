<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 2022530116
     */
    public function up()
{
    Schema::create('surat_keluar', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_surat');
        $table->string('tujuan');
        $table->string('perihal');
        $table->date('tanggal_surat');
        $table->string('file_path')->nullable();  // Untuk file
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
