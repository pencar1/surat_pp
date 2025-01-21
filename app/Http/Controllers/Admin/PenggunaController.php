<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = Pengguna::get();

        return view('admin.pengguna', compact('data'));
    }

    public function show($id)
    {
        $data = Pengguna::findOrFail($id);

        return view('admin.pengguna.lihatp', compact('data'));
    }

    public function profile()
    {
        $pengguna = Auth::user(); // Mendapatkan pengguna yang sedang login

        return view('admin.profilea', compact('pengguna'));
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

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui.');
    }

    public function create()
    {
        return view('admin.pengguna.tambahp');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:pengguna,email',
            'nohp' => 'required|string|max:16',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // minimal satu huruf kecil
                'regex:/[A-Z]/', // minimal satu huruf besar
            ],
            'status' => [
                'required',
                Rule::in(['admin', 'karyawan']), // hanya menerima admin atau karyawan
            ],
        ], [
            // Pesan error kustom
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 50 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'nohp.required' => 'Nomor HP harus diisi.',
            'nohp.string' => 'Nomor HP harus berupa teks.',
            'nohp.max' => 'Nomor HP maksimal 16 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf besar dan satu huruf kecil.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus berupa admin atau karyawan.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Simpan data ke database
        Pengguna::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nohp' => $request->input('nohp'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Request $request,$id)
    {
        $data = Pengguna::find($id);

        return view('admin.pengguna.ubahp', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pengguna', 'email')->ignore($user->idpengguna, 'idpengguna'), // Primary key diperbaiki
            ],
            'nohp' => 'required|string|max:16',
            'password' => [
                'nullable', // Password opsional
                'string',
                'min:8',
                'regex:/[a-z]/', // minimal satu huruf kecil
                'regex:/[A-Z]/', // minimal satu huruf besar
            ],
            'status' => [
                'required',
                Rule::in(['admin', 'karyawan']),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Update data pengguna
        $user->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nohp' => $request->input('nohp'),
            'password' => $request->input('password')
                ? Hash::make($request->input('password'))
                : $user->password, // Gunakan password lama jika tidak diubah
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $data = Pengguna::find($id);

        // Cek apakah pengguna yang ingin dihapus adalah admin
        if ($data && $data->status == 'admin') {
            return redirect()->route('admin.pengguna')->with('error', 'Admin tidak dapat dihapus.');
        }

        if ($data) {
            $data->delete();
            return redirect()->route('admin.pengguna')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('admin.pengguna')->with('error', 'Data tidak ditemukan.');
    }
}
