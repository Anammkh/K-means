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
        Schema::create('daftar_hadir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lansia_id')->constrained('data_lansia')->onDelete('cascade');
            $table->date('tanggal_kehadiran');
            $table->string('status_kehadiran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('daftar_hadir');
    }
};
