<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absen_bermasalah', function (Blueprint $table) {
            $table->id();
            $table->string('no_keterangan');
            $table->string('keterangan')->nullable();
            $table->string('lokasi_kampus');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('shift_kerja');
            $table->json('kondisi'); // [1,2,3] untuk absen masuk, tengah, pulang
            $table->string('petugas_input');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absen_bermasalah');
    }
}; 