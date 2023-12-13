<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_ekskuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ekskul');
            $table->string('penganggung_jawab', 50);
            $table->string('lokasi', 50);
            $table->string('hari', 50);
            $table->string('jam_mulai', 20);
            $table->string('jam_selesai', 50);
            $table->timestamps();

            $table->foreign('id_ekskul')->references('id')->on('ekskuls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ekskuls');
    }
};
