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
        Schema::create('pelangganmutasi', function (Blueprint $table) {
            $table->increments('idpel');
            $table->string('namapel');
            $table->text('alamatpel');
            $table->string('tarif');
            $table->string('daya');
            $table->string('amper');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelangganmutasi');
    }
};
