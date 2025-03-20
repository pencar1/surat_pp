<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MutasiN;
use App\Models\RubahTarif;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data mutasi
        $totalMutasi = MutasiN::count();

        // Hitung total data rubah tarif
        $totalRubahTarif = RubahTarif::count();


        // Kirim data ke view
        return view('karyawan.dashboardkaryawan', compact('totalMutasi','totalRubahTarif'));
        

    }
}
