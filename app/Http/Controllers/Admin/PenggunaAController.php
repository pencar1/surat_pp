<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaAController extends Controller
{
    public function index()
    {
        return view('admin.pengguna');
    }

    public function tambahpengguna()
    {
        return view('admin.pengguna.tambahp');
    }
}
