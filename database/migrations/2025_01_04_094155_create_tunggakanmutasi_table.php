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
        Schema::create('tunggakanmutasi', function (Blueprint $table) {
            $table->increments('idtunggakan');
            $table->unsignedInteger('idpel');
            $table->string('bulanawal');
            $table->string('bulanakhir');
            $table->string('lembar');
            $table->string('rptag3lembar');
            $table->string('rpbk3lembar');
            $table->string('rptot3lembar');
            $table->string('rptag1lembar');
            $table->string('rpbk1lembar');
            $table->string('rptot1lembar');
            $table->rememberToken();
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('idpel')->references('idpel')->on('pelangganmutasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunggakanmutasi');
    }
};
