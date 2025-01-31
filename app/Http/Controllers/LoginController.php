<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Gunakan `status` sebagai role
            switch ($user->status) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'karyawan':
                    return redirect()->route('karyawan.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('failed', 'Status pengguna tidak dikenali.');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}
