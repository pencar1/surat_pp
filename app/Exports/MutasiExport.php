<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MutasiExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data; // Data untuk isi tabel
    }

    public function headings(): array
    {
        return [
            'No',
            'IDPEL',
            'Nama Pelanggan',
            'Alamat',
            'Tarif',
            'Daya',
            'Amper',
            'Bulan Awal',
            'Bulan Akhir',
            'Lembar',
            'RP TAG 3 Lembar',
            'RP BK 3 Lembar',
            'RP TOT 3 Lembar',
            'Kode Ujung PK',
            'RP TAG 1 Lembar',
            'RP BK 1 Lembar',
            'RP TOT 1 Lembar',
            'Titik Koordinat',
            'Status Cetak',
        ]; // Header tabel
    }
}
