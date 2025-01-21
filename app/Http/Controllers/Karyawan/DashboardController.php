<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MutasiN;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data mutasi
        $totalMutasi = MutasiN::count();

        // Kirim data ke view
        return view('karyawan.dashboardkaryawan', compact('totalMutasi'));

    }
}
