<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunggakanMutasi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'tunggakanmutasi';

    // Menentukan kolom mana yang dapat diisi secara massal
    protected $fillable = [
        'idpel',
        'bulanawal',
        'bulanakhir',
        'lembar',
        'rptag3lembar',
        'rpbk3lembar',
        'rptot3lembar',
        'rptag1lembar',
        'rpbk1lembar',
        'rptot1lembar',
    ];

    /**
     * Relasi dengan model PelangganMutasi
     */
    public function pelangganMutasi()
    {
        return $this->belongsTo(PelangganMutasi::class, 'idpel');
    }
}
