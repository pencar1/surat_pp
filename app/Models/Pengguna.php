<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tabel yang terkait dengan model.
     */
    protected $table = 'pengguna';

    // Primary key dari tabel
    protected $primaryKey = 'idpengguna';

    // Menentukan apakah primary key menggunakan auto-increment atau tidak
    public $incrementing = true;

    // Tipe data dari primary key
    protected $keyType = 'int';

    // Menentukan apakah timestamps digunakan atau tidak
    public $timestamps = false;
    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'nohp',
        'password',
        'status',
    ];

    /**
     * Atribut yang harus disembunyikan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
