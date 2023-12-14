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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nohp', 16)->unique()->nullable()->after('email_verified_at');
            $table->string('nisn', 16)->unique()->nullable();
            $table->string('kelas', 10)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('hobi', 50)->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};
