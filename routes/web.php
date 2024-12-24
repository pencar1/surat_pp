<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAController;
use App\Http\Controllers\Admin\PenggunaAController;

Route::get('/', function () {
    return view('auth/login');
});

// Dashboard
Route::get('/dashboard', [DashboardAController::class, 'index'])->name('dashboard');

// Pengguna
Route::get('/pengguna', [PenggunaAController::class, 'index'])->name('pengguna');

Route::get('/create', [PenggunaAController::class, 'create'])->name('pengguna.create');

Route::post('/store', [PenggunaAController::class, 'store'])->name('pengguna.store');

Route::get('/pengguna/{id}/edit', [PenggunaAController::class, 'edit'])->name('pengguna.edit');

Route::put('/pengguna/{id}', [PenggunaAController::class, 'update'])->name('pengguna.update');

Route::delete('/pengguna/{id}', [PenggunaAController::class, 'destroy'])->name('pengguna.delete');


// Mutasi N
Route::get('/mutasi', function () {
    return view('admin/mutasinadmin');
})->name('mutasi');

// Rubah Tarif
Route::get('/rubah-tarif', function () {
    return view('admin/rubahtarifadmin');
})->name('rubah-tarif');

