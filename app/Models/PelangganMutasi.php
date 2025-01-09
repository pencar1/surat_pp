<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelangganMutasi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'pelangganmutasi';

    // Menentukan kolom mana yang dapat diisi secara massal
    protected $fillable = [
        'namapel',
        'alamatpel',
        'tarif',
        'daya',
        'amper',
    ];

    /**
     * Relasi dengan model TunggakanMutasi
     */
    public function tunggakanMutasi()
    {
        return $this->hasMany(TunggakanMutasi::class, 'idpel');
    }

    /**
     * Relasi dengan model BongkarRampung
     */
    public function bongkarRampung()
    {
        return $this->hasMany(BongkarRampung::class, 'idpel');
    }
}
