<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RubahTarif;
use Barryvdh\DomPDF\Facade\Pdf;

class RubahTarifController extends Controller
{
    /**
     * Menampilkan daftar permohonan perubahan tarif.
     */
    public function index()
    {
        $data = RubahTarif::paginate(10);
        return view('karyawan.rubahtarifkaryawan', compact('data'));
    }

    /**
     * Menampilkan detail permohonan perubahan tarif.
     */
    public function show($id_pel)
    {
        $data = RubahTarif::where('id_pel', $id_pel)->firstOrFail();
        return view('karyawan.rubahtarif.lihatr', compact('data'));
    }

    /**
     * Menampilkan form edit perubahan tarif.
     */
    public function edit($id_pel)
    {
        $data = RubahTarif::where('id_pel', $id_pel)->first();

        if (!$data) {
            return redirect()->route('rubahtarif')->withErrors('Data tidak ditemukan.');
        }

        return view('karyawan.rubahtarif.ubahr', compact('data'));
    }

    /**
     * Memperbarui data permohonan perubahan tarif.
     */
    public function update(Request $request, $id_pel)
    {
        $data = RubahTarif::where('id_pel', $id_pel)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $validator = $this->validateRequest($request, true);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $this->saveData($request, $data);

        return redirect()->route('karyawan.rubahtarif')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Mencetak surat perubahan tarif dalam format PDF.
     */
    public function print($id_pel)
    {
        $rubahTarif = RubahTarif::where('id_pel', $id_pel)->first();

        if (!$rubahTarif) {
            return redirect()->route('rubahtarif')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'rubahTarif' => $rubahTarif,
            'tanggal_cetak' => now()->format('d F Y'),
        ];

        $pdf = Pdf::loadView('karyawan.rubahtarif.surat', $data);

        return $pdf->stream('Surat_Perubahan_Tarif_' . $rubahTarif->id_pel . '.pdf');
    }

    /**
     * Validasi input permohonan perubahan tarif.
     */
    private function validateRequest(Request $request, $isUpdate = false)
{
    $rules = [
        'id_pel' => $isUpdate ? 'required|string|max:20' : 'required|string|max:20|unique:rubah_tarif,id_pel',
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string|max:500',
        'no_hp' => 'required|string|max:15',
        'nik_pelanggan' => 'required|string|size:16',
        'tarif_semula' => 'required|string|max:50',
        'tarif_menjadi' => 'required|string|max:50',
        'perubahan_daya' => 'required|string|in:Tambah Daya,Turun Daya,Tetap',
        'nib' => 'nullable|string|max:50',
        'verifikasi_nib' => 'required|string|in:ADA,TIDAK ADA',
        'tanggal_survey' => 'required|date',
        'info_dtks' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,png|max:2048',
        'berkas_permohonan' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,png|max:2048',
        'berkas_ktp' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,png|max:2048',
        'berkas_npwp' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,png|max:2048',
        'berkas_akta' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,png|max:2048',
    ];

    $messages = [
        'id_pel.required' => 'ID Pelanggan wajib diisi.',
        'id_pel.unique' => 'ID Pelanggan sudah digunakan.',
        'nama.required' => 'Nama wajib diisi.',
        'alamat.required' => 'Alamat wajib diisi.',
        'no_hp.required' => 'Nomor HP wajib diisi.',
        'nik_pelanggan.required' => 'NIK wajib diisi.',
        'nik_pelanggan.size' => 'NIK harus terdiri dari 16 angka.',
        'tarif_semula.required' => 'Tarif/Daya Semula wajib diisi.',
        'tarif_menjadi.required' => 'Tarif/Daya Menjadi wajib diisi.',
        'perubahan_daya.required' => 'Perubahan daya wajib dipilih.',
        'verifikasi_nib.required' => 'Verifikasi NIB wajib dipilih.',
        'tanggal_survey.required' => 'Tanggal survey wajib diisi.',
        'tanggal_survey.date' => 'Format tanggal tidak valid.',
        
        'info_dtks.required' => 'Berkas INFO DTKS wajib diunggah.',
        'berkas_permohonan.required' => 'Foto KWH meter wajib diunggah.',
        'berkas_ktp.required' => 'Fotokopi KTP wajib diunggah.',
        'berkas_npwp.required' => 'Foto Selfie dengan KTP wajib diunggah.',
        'berkas_akta.required' => 'Foto Rumah wajib diunggah.',

        'info_dtks.mimes' => 'Berkas INFO DTKS harus dalam format PDF, JPG, atau PNG.',
        'berkas_permohonan.mimes' => 'Foto KWH meter harus dalam format PDF, JPG, atau PNG.',
        'berkas_ktp.mimes' => 'Fotokopi KTP harus dalam format PDF, JPG, atau PNG.',
        'berkas_npwp.mimes' => 'Foto Selfie KTP harus dalam format PDF, JPG, atau PNG.',
        'berkas_akta.mimes' => 'Foto Rumah harus dalam format PDF, JPG, atau PNG.',
        
        'info_dtks.max' => 'Ukuran berkas INFO DTKS tidak boleh lebih dari 2MB.',
        'berkas_permohonan.max' => 'Ukuran Foto KWH meter tidak boleh lebih dari 2MB.',
        'berkas_ktp.max' => 'Ukuran Fotokopi KTP tidak boleh lebih dari 2MB.',
        'berkas_npwp.max' => 'Ukuran Foto Selfie KTP tidak boleh lebih dari 2MB.',
        'berkas_akta.max' => 'Ukuran Foto Rumah tidak boleh lebih dari 2MB.',
    ];

    return Validator::make($request->all(), $rules, $messages);
}

    /**
     * Menyimpan data permohonan perubahan tarif ke dalam database.
     */
    private function saveData(Request $request, RubahTarif $rubahTarif)
    {
        $rubahTarif->id_pel = $request->id_pel;
        $rubahTarif->nama = $request->nama;
        $rubahTarif->alamat = $request->alamat;
        $rubahTarif->no_hp = $request->no_hp;
        $rubahTarif->nik_pelanggan = $request->nik_pelanggan;
        $rubahTarif->tarif_semula = $request->tarif_semula;
        $rubahTarif->tarif_menjadi = $request->tarif_menjadi;
        $rubahTarif->perubahan_daya = $request->perubahan_daya;
        $rubahTarif->nib = $request->nib;
        $rubahTarif->verifikasi_nib = $request->verifikasi_nib;
        $rubahTarif->tanggal_survey = $request->tanggal_survey;

        $fileFields = ['info_dtks', 'berkas_permohonan', 'berkas_ktp', 'berkas_npwp', 'berkas_akta'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($rubahTarif->$field) {
                    $oldFilePath = public_path('uploads/rubahtarif/' . $rubahTarif->$field);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Simpan file baru
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/rubahtarif'), $filename);
                $rubahTarif->$field = $filename;
            }
        }

        $rubahTarif->save();
    }
}
