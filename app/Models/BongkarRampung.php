<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BongkarRampung extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'bongkarrampung';

    // Menentukan kolom mana yang dapat diisi secara massal
    protected $fillable = [
        'idpel',
        'fotorumah',
        'titikkoordinat',
    ];

    /**
     * Relasi dengan model PelangganMutasi
     */
    public function pelangganMutasi()
    {
        return $this->belongsTo(PelangganMutasi::class, 'idpel');
    }
}
