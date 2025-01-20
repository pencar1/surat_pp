<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MutasiN;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MutasiExport;
use Maatwebsite\Excel\Facades\Excel;

class MutasiNController extends Controller
{
    public function index()
    {
        $data = MutasiN::get();

        return view('admin.mutasinadmin', compact('data'));
    }

    public function show($id)
    {
        $data = MutasiN::findOrFail($id);

        return view('admin.mutasi.lihatm', compact('data'));
    }

    public function create()
    {
        return view('admin.mutasi.tambahm');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'idpel' => 'required|integer|unique:mutasi_n,idpel',
            'namapel' => 'required|string|max:255',
            'alamatpel' => 'required|string|max:500',
            'tarif' => 'required|string|max:50',
            'daya' => 'required|integer|min:1',
            'amper' => 'required|string|max:50',
            'bulanawal' => 'required|string|max:50',
            'bulanakhir' => 'required|string|max:50',
            'lembar' => 'required|integer|min:1',
            'rptag3lembar' => 'required|numeric|min:1',
            'rpbk3lembar' => 'required|numeric|min:1',
            'rptot3lembar' => '',
            'kodeujungpk' => 'required|string|max:50',
            'rptag1lembar' => 'required|numeric|min:1',
            'rpbk1lembar' => 'required|numeric|min:1',
            'rptot1lembar' => '',
            'fotorumah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'titikkoordinat' => 'required|string|max:255',
        ], [
            // Pesan error kustom
            'idpel.required' => 'ID pelanggan harus diisi.',
            'idpel.integer' => 'ID pelanggan harus berupa angka.',
            'idpel.unique' => 'ID pelanggan sudah terdaftar.',
            'namapel.required' => 'Nama pelanggan harus diisi.',
            'namapel.string' => 'Nama pelanggan harus berupa teks.',
            'namapel.max' => 'Nama pelanggan maksimal 255 karakter.',
            'alamatpel.required' => 'Alamat pelanggan harus diisi.',
            'alamatpel.string' => 'Alamat pelanggan harus berupa teks.',
            'alamatpel.max' => 'Alamat pelanggan maksimal 500 karakter.',
            'tarif.required' => 'Tarif harus diisi.',
            'tarif.string' => 'Tarif harus berupa teks.',
            'tarif.max' => 'Tarif maksimal 50 karakter.',
            'daya.required' => 'Daya harus diisi.',
            'daya.integer' => 'Daya harus berupa angka.',
            'daya.min' => 'Daya minimal adalah 1.',
            'amper.required' => 'Amper harus diisi.',
            'amper.string' => 'Amper harus berupa teks.',
            'amper.max' => 'Amper maksimal 50 karakter.',
            'bulanawal.required' => 'Bulan awal harus diisi.',
            'bulanakhir.required' => 'Bulan akhir harus diisi.',
            'lembar.required' => 'Jumlah lembar harus diisi.',
            'lembar.integer' => 'Jumlah lembar harus berupa angka.',
            'lembar.min' => 'Jumlah lembar minimal adalah 1.',
            'rptag3lembar.required' => 'Tagihan 3 lembar harus diisi.',
            'rptag3lembar.numeric' => 'Tagihan 3 lembar harus berupa angka.',
            'rptag3lembar.min' => 'Tagihan 3 lembar minimal adalah 1.',
            'rpbk3lembar.required' => 'Biaya keterlambatan 3 lembar harus diisi.',
            'rpbk3lembar.numeric' => 'Biaya keterlambatan 3 lembar harus berupa angka.',
            'rpbk3lembar.min' => 'Biaya keterlambatan 3 lembar minimal adalah 1.',
            'kodeujungpk.required' => 'Kode ujung pk harus diisi.',
            'rptag1lembar.required' => 'Tagihan 1 lembar harus diisi.',
            'rptag1lembar.numeric' => 'Tagihan 1 lembar harus berupa angka.',
            'rptag1lembar.min' => 'Tagihan 1 lembar minimal adalah 1.',
            'rpbk1lembar.required' => 'Biaya keterlambatan 1 lembar harus diisi.',
            'rpbk1lembar.numeric' => 'Biaya keterlambatan 1 lembar harus berupa angka.',
            'rpbk1lembar.min' => 'Biaya keterlambatan 1 lembar minimal adalah 1.',
            'fotorumah.required' => 'Foto rumah harus diunggah.',
            'fotorumah.image' => 'Foto rumah harus berupa gambar.',
            'fotorumah.mimes' => 'Foto rumah harus berupa file berformat jpeg, png, atau jpg.',
            'fotorumah.max' => 'Ukuran foto rumah maksimal adalah 2MB.',
            'titikkoordinat.required' => 'Titik koordinat harus diisi.',
            'titikkoordinat.max' => 'Titik koordinat maksimal 255 karakter.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mutasi = new MutasiN();
        $mutasi->idpel = $request->input('idpel');
        $mutasi->namapel = $request->input('namapel');
        $mutasi->alamatpel = $request->input('alamatpel');
        $mutasi->tarif = $request->input('tarif');
        $mutasi->daya = $request->input('daya');
        $mutasi->amper = $request->input('amper');
        $mutasi->bulanawal = $request->input('bulanawal');
        $mutasi->bulanakhir = $request->input('bulanakhir');
        $mutasi->lembar = $request->input('lembar');
        $mutasi->rptag3lembar = $request->input('rptag3lembar');
        $mutasi->rpbk3lembar = $request->input('rpbk3lembar');
        $mutasi->rptot3lembar = $request->input('rptot3lembar');
        $mutasi->kodeujungpk = $request->input('kodeujungpk');
        $mutasi->rptag1lembar = $request->input('rptag1lembar');
        $mutasi->rpbk1lembar = $request->input('rpbk1lembar');
        $mutasi->rptot1lembar = $request->input('rptot1lembar');
        $mutasi->fotorumah = $request->input('fotorumah');
        $mutasi->titikkoordinat = $request->input('titikkoordinat');

        if ($request->hasFile('fotorumah')) {
            $file = $request->file('fotorumah');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/mutasi'), $filename);
            $mutasi->fotorumah = $filename;
        }

        $mutasi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.mutasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request,$id)
    {
        $data = MutasiN::where('idpel', $id)->first();

        if (!$data) {
            return redirect()->route('admin.mutasi')->withErrors('Data tidak ditemukan.');
        }

        return view('admin.mutasi.ubahm', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'idpel' => 'required|integer|unique:mutasi_n,idpel,' . $id . ',idpel',
            'namapel' => 'required|string|max:255',
            'alamatpel' => 'required|string|max:500',
            'tarif' => 'required|string|max:50',
            'daya' => 'required|integer|min:1',
            'amper' => 'required|string|max:50',
            'bulanawal' => 'required|string|max:50',
            'bulanakhir' => 'required|string|max:50',
            'lembar' => 'required|integer|min:1',
            'rptag3lembar' => 'required|numeric|min:1',
            'rpbk3lembar' => 'required|numeric|min:1',
            'rptot3lembar' => '',
            'kodeujungpk' => 'required|string|max:50',
            'rptag1lembar' => 'required|numeric|min:1',
            'rpbk1lembar' => 'required|numeric|min:1',
            'rptot1lembar' => '',
            'fotorumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'titikkoordinat' => 'required|string|max:255',
        ], [
            // Pesan error kustom
            'idpel.required' => 'ID pelanggan harus diisi.',
            'idpel.integer' => 'ID pelanggan harus berupa angka.',
            'idpel.unique' => 'ID pelanggan sudah terdaftar.',
            'namapel.required' => 'Nama pelanggan harus diisi.',
            'namapel.string' => 'Nama pelanggan harus berupa teks.',
            'namapel.max' => 'Nama pelanggan maksimal 255 karakter.',
            'alamatpel.required' => 'Alamat pelanggan harus diisi.',
            'alamatpel.string' => 'Alamat pelanggan harus berupa teks.',
            'alamatpel.max' => 'Alamat pelanggan maksimal 500 karakter.',
            'tarif.required' => 'Tarif harus diisi.',
            'tarif.string' => 'Tarif harus berupa teks.',
            'tarif.max' => 'Tarif maksimal 50 karakter.',
            'daya.required' => 'Daya harus diisi.',
            'daya.integer' => 'Daya harus berupa angka.',
            'daya.min' => 'Daya minimal adalah 1.',
            'amper.required' => 'Amper harus diisi.',
            'amper.string' => 'Amper harus berupa teks.',
            'amper.max' => 'Amper maksimal 50 karakter.',
            'bulanawal.required' => 'Bulan awal harus diisi.',
            'bulanakhir.required' => 'Bulan akhir harus diisi.',
            'lembar.required' => 'Jumlah lembar harus diisi.',
            'lembar.integer' => 'Jumlah lembar harus berupa angka.',
            'lembar.min' => 'Jumlah lembar minimal adalah 1.',
            'rptag3lembar.required' => 'Tagihan 3 lembar harus diisi.',
            'rptag3lembar.numeric' => 'Tagihan 3 lembar harus berupa angka.',
            'rptag3lembar.min' => 'Tagihan 3 lembar minimal adalah 1.',
            'rpbk3lembar.required' => 'Biaya keterlambatan 3 lembar harus diisi.',
            'rpbk3lembar.numeric' => 'Biaya keterlambatan 3 lembar harus berupa angka.',
            'rpbk3lembar.min' => 'Biaya keterlambatan 3 lembar minimal adalah 1.',
            'kodeujungpk.required' => 'Kode ujung pk harus diisi.',
            'rptag1lembar.required' => 'Tagihan 1 lembar harus diisi.',
            'rptag1lembar.numeric' => 'Tagihan 1 lembar harus berupa angka.',
            'rptag1lembar.min' => 'Tagihan 1 lembar minimal adalah 1.',
            'rpbk1lembar.required' => 'Biaya keterlambatan 1 lembar harus diisi.',
            'rpbk1lembar.numeric' => 'Biaya keterlambatan 1 lembar harus berupa angka.',
            'rpbk1lembar.min' => 'Biaya keterlambatan 1 lembar minimal adalah 1.',
            'fotorumah.image' => 'Foto rumah harus berupa gambar.',
            'fotorumah.mimes' => 'Foto rumah harus berupa file berformat jpeg, png, atau jpg.',
            'fotorumah.max' => 'Ukuran foto rumah maksimal adalah 2MB.',
            'titikkoordinat.required' => 'Titik koordinat harus diisi.',
            'titikkoordinat.max' => 'Titik koordinat maksimal 255 karakter.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mutasi = MutasiN::find($id);
        if (!$mutasi) {
            return redirect()->route('admin.mutasi')->withErrors('Data tidak ditemukan.');
        }

        $mutasi->idpel = $request->input('idpel');
        $mutasi->namapel = $request->input('namapel');
        $mutasi->alamatpel = $request->input('alamatpel');
        $mutasi->tarif = $request->input('tarif');
        $mutasi->daya = $request->input('daya');
        $mutasi->amper = $request->input('amper');
        $mutasi->bulanawal = $request->input('bulanawal');
        $mutasi->bulanakhir = $request->input('bulanakhir');
        $mutasi->lembar = $request->input('lembar');
        $mutasi->rptag3lembar = str_replace(',', '', $request->input('rptag3lembar'));
        $mutasi->rpbk3lembar = str_replace(',', '', $request->input('rpbk3lembar'));
        $mutasi->rptot3lembar = str_replace(',', '', $request->input('rptot3lembar'));
        $mutasi->kodeujungpk = $request->input('kodeujungpk');
        $mutasi->rptag1lembar = str_replace(',', '', $request->input('rptag1lembar'));
        $mutasi->rpbk1lembar = str_replace(',', '', $request->input('rpbk1lembar'));
        $mutasi->rptot1lembar = str_replace(',', '', $request->input('rptot1lembar'));
        $mutasi->titikkoordinat = $request->input('titikkoordinat');

        if ($request->hasFile('fotorumah')) {
            // Hapus file lama
            if ($mutasi->fotorumah) {
                $old_file_path = public_path('images/mutasi/' . $mutasi->fotorumah);
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            // Simpan file baru
            $file = $request->file('fotorumah');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/mutasi'), $filename);
            $mutasi->fotorumah = $filename;
        }

        $mutasi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.mutasi')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mutasi = MutasiN::find($id);
        if ($mutasi) {
            if ($mutasi->fotorumah) {
                // Delete the associated photo file
                $file_path = public_path('images/mutasi/' . $mutasi->fotorumah);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $mutasi->delete();
        }


        return redirect()->route('admin.mutasi')->with('success', 'Data berhasil dihapus.');
    }

    public function print($id)
    {
        // Ambil data mutasi berdasarkan ID
        $mutasi = MutasiN::find($id);

        if (!$mutasi) {
            return redirect()->route('admin.mutasi')->with('error', 'Data tidak ditemukan.');
        }

        // Data yang akan dikirimkan ke view
        $data = [
            'mutasi' => $mutasi,
            'tanggal_cetak' => now()->format('d F Y'), // Tanggal cetak
        ];

        // Render PDF menggunakan DomPDF
        $pdf = Pdf::loadView('admin.mutasi.surat', $data);

        $mutasi->status_cetak = 'Sudah Dicetak';  // Update keterangan secara manual
        $mutasi->save();

        // Stream file PDF ke browser (menampilkan di tab baru)
        return $pdf->stream('Surat_Pekerjaan_' . $mutasi->idpel . '.pdf');
    }

    public function exportExcel()
    {
        $data = MutasiN::all()->map(function ($item, $key) {
            return [
                $key + 1, // No
                $item->idpel,
                $item->namapel,
                $item->alamatpel,
                $item->tarif,
                $item->daya,
                $item->amper,
                $item->bulanawal,
                $item->bulanakhir,
                $item->lembar,
                $item->rptag3lembar,
                $item->rpbk3lembar,
                $item->rptot3lembar,
                $item->kodeujungpk,
                $item->rptag1lembar,
                $item->rpbk1lembar,
                $item->rptot1lembar,
                $item->titikkoordinat,
                $item->status_cetak === 'Belum Dicetak' ? 'Belum Dicetak' : 'Sudah Dicetak',
            ];
        });

        return Excel::download(new MutasiExport($data->toArray()), 'Mutasi.xlsx');
    }
}
