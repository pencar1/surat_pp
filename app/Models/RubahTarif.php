<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubahTarif extends Model
{
    use HasFactory;
    
    protected $table = 'rubah_tarif';
    protected $primaryKey = 'id_pel'; // Primary Key
    public $incrementing = false; // Karena primary key bukan auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'id_pel', 'nama', 'alamat', 'no_hp', 'nik_pelanggan',
        'tarif_semula', 'tarif_menjadi', 'perubahan_daya', 
        'nib', 'verifikasi_nib', 'tanggal_survey', 'info_dtks',
        'berkas_permohonan', 'berkas_ktp', 'berkas_npwp', 'berkas_akta'
    ];
}