<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAController;

Route::get('/', function () {
    return view('admin/rubahtarifadmin');
});

// Route::get('/dashboardcoba', [DashboardAController::class, 'index'])->name('dashboardcoba');
