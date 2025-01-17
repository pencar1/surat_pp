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
            $table->decimal('rptag3lembar', 15, 2);
            $table->decimal('rpbk3lembar', 15, 2);
            $table->decimal('rptot3lembar', 15, 2);
            $table->string('kodeujungpk');
            $table->decimal('rptag1lembar', 15, 2);
            $table->decimal('rpbk1lembar', 15, 2);
            $table->decimal('rptot1lembar', 15, 2);
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
