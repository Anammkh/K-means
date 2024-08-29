<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_lansia', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('umur')->nullable();
            $table->string('kemampuan_berjalan')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('jumlah_anggota_keluarga')->nullable();
            $table->string('status_pekerjaan')->nullable();
            $table->string('penghasilan_perbulan')->nullable();
            $table->timestamps();
        });
    }
}; 