<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function profile()
    {
        $pengguna = Auth::user(); // Mendapatkan pengguna yang sedang login

        return view('karyawan.profilek', compact('pengguna'));
    }

    public function updateProfile(Request $request)
    {
        $pengguna = Auth::user();

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'nohp' => 'required|string|max:16',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($pengguna->id),
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/', // Minimal satu huruf kecil
                'regex:/[A-Z]/', // Minimal satu huruf besar
            ],
        ], [
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'nohp.required' => 'Nomor HP tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung huruf besar dan kecil.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $pengguna->nama = $request->nama;
        $pengguna->alamat = $request->alamat;
        $pengguna->nohp = $request->nohp;
        $pengguna->email = $request->email;

        if ($request->filled('password')) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        return redirect()->route('karyawan.profile')->with('success', 'Profile berhasil diperbarui.');
    }
}
