<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RubahTarifExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = collect($data);
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'No', 'ID Pelanggan', 'Nama', 'Alamat', 'No HP', 'NIK Pelanggan', 
            'Tarif Semula', 'Tarif Menjadi', 'Perubahan Daya', 
            'NIB', 'Verifikasi NIB', 'Tanggal Survey'
        ];
    }
}
