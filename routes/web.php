<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAController;
use App\Http\Controllers\Admin\PenggunaAController;

// Route::get('/', function () {
//     return view('admin/mutasinadmin');
// });

// Dashboard
Route::get('/dashboard', [DashboardAController::class, 'index'])->name('dashboard');

// Pengguna
Route::get('/pengguna', function () {
    return view('admin/pengguna');
})->name('pengguna');

// Mutasi N
Route::get('/mutasi', function () {
    return view('admin/mutasinadmin');
})->name('mutasi');

// Rubah Tarif
Route::get('/rubah-tarif', function () {
    return view('admin/rubahtarifadmin');
})->name('rubah-tarif');

Route::get('/tambahpengguna', [PenggunaAController::class, 'tambahpengguna'])->name('pengguna.tambah');
