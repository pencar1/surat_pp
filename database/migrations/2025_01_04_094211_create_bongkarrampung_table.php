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
        Schema::create('bongkarrampung', function (Blueprint $table) {
            $table->increments('idbongkar');
            $table->unsignedInteger('idpel');
            $table->string('fotorumah');
            $table->text('titikkoordinat');
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
        Schema::dropIfExists('bongkarrampung');
    }
};
