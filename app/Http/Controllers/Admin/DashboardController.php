<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use app\Models\Pengguna;
use App\Models\MutasiN;
use App\Models\RubahTarif;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data pengguna
        $totalPengguna = Pengguna::count();

        // Hitung total data mutasi
        $totalMutasi = MutasiN::count();

        // Hitung total data rubah tarif
        $totalRubahTarif = RubahTarif::count();

        // Kirim data ke view
        return view('admin.dashboardadmin', compact('totalPengguna', 'totalMutasi', 'totalRubahTarif'));
    }
}
