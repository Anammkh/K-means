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
        Schema::create('data_posyandu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lansia_id')->constrained('data_lansia')->onDelete('cascade');
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->float('lingkar_pinggang');
            $table->string('tekanan_darah');
            $table->string('gula_darah');
            $table->text('keluhan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_posyandu');
    }
};