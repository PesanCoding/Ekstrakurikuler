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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_ekskul');
            $table->string('pertemuan', 25);
            $table->string('materi', 200);
            $table->string('jam_masuk', 20);
            $table->string('jam_keluar', 20);

            $table->foreign('id_siswa')->references('id')->on('users');
            $table->foreign('id_ekskul')->references('id')->on('ekskuls');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
