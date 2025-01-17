<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiN extends Model
{
    use HasFactory;

    protected $table = 'mutasi_n';

    // Primary key dari tabel
    protected $primaryKey = 'idpel';

    // Tipe data dari primary key
    protected $keyType = 'string';

    // Menentukan apakah timestamps digunakan atau tidak
    public $timestamps = false;

    protected $fillable = [
        'idpel',
        'namapel',
        'alamatpel',
        'tarif',
        'daya',
        'amper',
        'bulanawal',
        'bulanakhir',
        'lembar',
        'rptag3lembar',
        'rpbk3lembar',
        'rptot3lembar',
        'kodeujungpk',
        'rptag1lembar',
        'rpbk1lembar',
        'rptot1lembar',
        'fotorumah',
        'titikkoordinat',
        'status_cetak',
    ];
}
