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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('idpengguna');
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('nohp');
            $table->string('password');
            $table->enum('status', ['admin', 'karyawan'])->default('karyawan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
