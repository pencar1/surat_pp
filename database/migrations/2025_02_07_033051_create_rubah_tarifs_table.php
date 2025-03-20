<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('rubah_tarif', function (Blueprint $table) {
            $table->string('id_pel', 20)->primary(); // ID Pelanggan sebagai Primary Key
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->string('nik_pelanggan', 20);
            $table->string('tarif_semula', 50);
            $table->string('tarif_menjadi', 50);
            $table->enum('perubahan_daya', ['Tambah Daya', 'Turun Daya', 'Tetap']);
            $table->json('tarif_semula_options')->nullable();
            $table->json('tarif_menjadi_options')->nullable();
            $table->string('nib', 50)->nullable();
            $table->enum('verifikasi_nib', ['ADA', 'TIDAK ADA'])->nullable();
            $table->string('berkas_permohonan')->nullable();
            $table->string('berkas_ktp')->nullable();
            $table->string('berkas_npwp')->nullable();
            $table->string('berkas_akta')->nullable();
            $table->string('ttd_surveyor')->default('FAHRIANSYAH');
            $table->string('ttd_pntl')->default('FAHRIANSYAH');
            $table->string('ttd_manajer')->default('ARUJANSYAH');
            $table->date('tanggal_survey')->default(now());
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('rubah_tarif');
    }
};
