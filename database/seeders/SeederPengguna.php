<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederPengguna extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::create([
            'nama'          => 'admin',
            'alamat'        => 'Banjarbaru',
            'email'         => 'admin123@gmail.com',
            'nohp'          => '08000000000',
            'password'      => Hash::make('Admin@123'),
            'status'        => 'admin',
        ]);

        Pengguna::create([
            'nama'          => 'muhammad',
            'alamat'        => 'Banjarbaru',
            'email'         => 'muhammad@gmail.com',
            'nohp'          => '08000000000',
            'password'      => Hash::make('Muhammad'),
            'status'        => 'karyawan',
        ]);
    }
}
