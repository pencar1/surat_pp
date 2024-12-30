<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;

use App\Http\Controllers\Karyawan\DashboardController as KaryawanDashboardController;

use App\Http\Middleware\RoleCheck;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route group for admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', RoleCheck::class . ':admin'], 'as' => 'admin.'], function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Pengguna
    Route::get('/pengguna', [AdminPenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/{id}', [AdminPenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/create', [AdminPenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/store', [AdminPenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [AdminPenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [AdminPenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [AdminPenggunaController::class, 'destroy'])->name('pengguna.delete');

    // Mutasi N
    Route::get('/mutasi', function () {
        return view('admin/mutasinadmin');
    })->name('mutasi');

    // Rubah Tarif
    Route::get('/rubah-tarif', function () {
        return view('admin/rubahtarifadmin');
    })->name('rubah-tarif');
});

Route::group(['prefix' => 'karyawan', 'middleware' => ['auth', RoleCheck::class . ':karyawan'], 'as' => 'karyawan.'], function () {
    // Dashboard
    Route::get('/dashboard', [KaryawanDashboardController::class, 'index'])->name('dashboard');

    // Mutasi N
    Route::get('/mutasi', function () {
        return view('karyawan/mutasinkaryawan');
    })->name('mutasi');

    // Rubah Tarif
    Route::get('/rubah-tarif', function () {
        return view('karyawan/rubahtarifkaryawan');
    })->name('rubah-tarif');
});

