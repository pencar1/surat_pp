<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;
use App\Http\Controllers\Admin\MutasiNController as AdminMutasiNController;
use App\Http\Controllers\Admin\RubahTarifController as AdminRubahTarifController;

use App\Http\Controllers\Karyawan\DashboardController as KaryawanDashboardController;
use App\Http\Controllers\Karyawan\PenggunaController as KaryawanPenggunaController;
use App\Http\Controllers\Karyawan\MutasiNController as KaryawanMutasiNController;
use App\Http\Controllers\Karyawan\RubahTarifController as KaryawanRubahTarifController;
use App\Http\Middleware\RoleCheck;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route group for admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', RoleCheck::class . ':admin'], 'as' => 'admin.'], function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [AdminPenggunaController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [AdminPenggunaController::class, 'updateProfile'])->name('profile.update');

    // Pengguna
    Route::get('/pengguna', [AdminPenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/show/{id}', [AdminPenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/pengguna/create', [AdminPenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna/store', [AdminPenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/edit/{id}', [AdminPenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/update/{id}', [AdminPenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/delete/{id}', [AdminPenggunaController::class, 'destroy'])->name('pengguna.delete');

    // Mutasi N
    Route::get('/mutasi', [AdminMutasiNController::class, 'index'])->name('mutasi');
    Route::get('/mutasi/show/{id}', [AdminMutasiNController::class, 'show'])->name('mutasi.show');
    Route::get('/mutasi/create', [AdminMutasiNController::class, 'create'])->name('mutasi.create');
    Route::post('/mutasi/store', [AdminMutasiNController::class, 'store'])->name('mutasi.store');
    Route::get('/mutasi/edit{id}', [AdminMutasiNController::class, 'edit'])->name('mutasi.edit');
    Route::put('/mutasi/update{id}', [AdminMutasiNController::class, 'update'])->name('mutasi.update');
    Route::delete('/mutasi/delete{id}', [AdminMutasiNController::class, 'destroy'])->name('mutasi.delete');
    Route::post('/mutasi/print/{id}', [AdminMutasiNController::class, 'print'])->name('mutasi.print');
    Route::get('/mutasi/export', [AdminMutasiNController::class, 'exportExcel'])->name('mutasi.export');

    // Rubah Tarif
    Route::get('/rubahtarif', [AdminRubahTarifController::class, 'index'])->name('rubahtarif');
    Route::get('rubahtarif/{id_pel}', [AdminRubahTarifController::class, 'show'])->where('id_pel', '[0-9]+')->name('rubahtarif.show');
    Route::get('/rubahtarif/create', [AdminRubahTarifController::class, 'create'])->name('rubahtarif.create');
    Route::post('/rubahtarif/store', [AdminRubahTarifController::class, 'store'])->name('rubahtarif.store');
    Route::get('/rubahtarif/edit/{id_pel}', [AdminRubahTarifController::class, 'edit'])->name('rubahtarif.edit');
    Route::put('/rubahtarif/update/{id_pel}', [AdminRubahTarifController::class, 'update'])->name('rubahtarif.update');
    Route::delete('/rubahtarif/delete/{id_pel}', [AdminRubahTarifController::class, 'destroy'])->name('rubahtarif.delete');
    Route::post('/rubahtarif/print/{id_pel}', [AdminRubahTarifController::class, 'print'])->name('rubahtarif.print');
    Route::get('/rubahtarif/export', [AdminRubahTarifController::class, 'exportExcel'])->name('rubahtarif.export');

});

Route::group(['prefix' => 'karyawan', 'middleware' => ['auth', RoleCheck::class . ':karyawan'], 'as' => 'karyawan.'], function () {
    // Dashboard
    Route::get('/dashboard', [KaryawanDashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [KaryawanPenggunaController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [KaryawanPenggunaController::class, 'updateProfile'])->name('profile.update');

    // Mutasi N
    Route::get('/mutasi', [KaryawanMutasiNController::class, 'index'])->name('mutasi');
    Route::get('/mutasi/show/{id}', [KaryawanMutasiNController::class, 'show'])->name('mutasi.show');
    Route::get('/mutasi/edit{id}', [KaryawanMutasiNController::class, 'edit'])->name('mutasi.edit');
    Route::put('/mutasi/update{id}', [KaryawanMutasiNController::class, 'update'])->name('mutasi.update');
    Route::post('/mutasi/print/{id}', [KaryawanMutasiNController::class, 'print'])->name('mutasi.print');

    // Rubah Tarif
    Route::get('/rubahtarif', [KaryawanRubahTarifController::class, 'index'])->name('rubahtarif');
    Route::get('rubahtarif/{id_pel}', [KaryawanRubahTarifController::class, 'show'])->where('id_pel', '[0-9]+')->name('rubahtarif.show');
    Route::get('/rubahtarif/edit{id_pel}', [KaryawanRubahTarifController::class, 'edit'])->name('rubahtarif.edit');
    Route::put('/rubahtarif/update{id_pel}', [KaryawanRubahTarifController::class, 'update'])->name('rubahtarif.update');
    Route::post('/rubahtarif/print/{id_pel}', [KaryawanRubahTarifController::class, 'print'])->name('rubahtarif.print');

});

