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
        Schema::create('mutasi_n', function (Blueprint $table) {
            $table->string('idpel')->primary();
            $table->string('namapel');
            $table->string('alamatpel');
            $table->string('tarif');
            $table->integer('daya');
            $table->string('amper');
            $table->string('bulanawal');
            $table->string('bulanakhir');
            $table->integer('lembar');
            $table->unsignedBigInteger('rptag3lembar');
            $table->unsignedBigInteger('rpbk3lembar');
            $table->unsignedBigInteger('rptot3lembar');
            $table->string('kodeujungpk');
            $table->unsignedBigInteger('rptag1lembar');
            $table->unsignedBigInteger('rpbk1lembar');
            $table->unsignedBigInteger('rptot1lembar');
            $table->string('fotorumah');
            $table->string('titikkoordinat');
            $table->string('status_cetak')->default('Belum Dicetak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_n');
    }
};
