<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('rubah_tarif', function (Blueprint $table) {
            $table->string('info_dtks')->nullable()->after('berkas_akta'); // Menambahkan kolom info_dtks setelah berkas_akta
        });
    }

    public function down() {
        Schema::table('rubah_tarif', function (Blueprint $table) {
            $table->dropColumn('info_dtks'); // Hapus kolom jika rollback
        });
    }
};
