<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Survey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .evidence-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .evidence-table th, .evidence-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .evidence-table img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .signature-section {
            margin-top: 40px;
            text-align: center;
        }
        .signature {
            width: 20%;
            display: inline-block;
            text-align: center;
            vertical-align: top;
            padding: 10px;
        }
        .signature p {
            margin: 5px 0;
        }
        .signature .line {
            margin-top: 10px;
            border-top: 1px solid #000;
            width: 100%;
            min-height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>DATA SURVEY PERUBAHAN TARIF</h3>
        </div>
        <p>
            Pada hari ini, {{ now()->translatedFormat('l') }} tanggal {{ now()->format('d') }} bulan {{ now()->translatedFormat('F') }} tahun {{ now()->format('Y') }}, telah dilakukan survey terhadap pelanggan berikut:
        </p>
        <table class="table">
            <tr>
                <td><strong>IDPEL</strong></td>
                <td>{{ $rubahTarif->id_pel }}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>{{ $rubahTarif->nama }}</td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>{{ $rubahTarif->alamat }}</td>
            </tr>
            <tr>
                <td><strong>No. HP</strong></td>
                <td>{{ $rubahTarif->no_hp }}</td>
            </tr>
            <tr>
                <td><strong>NIK Pelanggan</strong></td>
                <td>{{ $rubahTarif->nik_pelanggan }}</td>
            </tr>
            <tr>
                <td><strong>Perubahan Daya</strong></td>
                <td>{{ $rubahTarif->perubahan_daya }}</td>
            </tr>
            <tr>
                <td><strong>Tarif/Daya Semula</strong></td>
                <td>{{ $rubahTarif->tarif_semula }}</td>
            </tr>
            <tr>
                <td><strong>Tarif/Daya Menjadi</strong></td>
                <td>{{ $rubahTarif->tarif_menjadi }}</td>
            </tr>
            <tr>
                <td><strong>Nomor Induk Berusaha (NIB)</strong></td>
                <td>{{ $rubahTarif->nib ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Verifikasi NIB oleh PLN</strong></td>
                <td>{{ $rubahTarif->verifikasi_nib == 'ADA' ? 'ADA' : 'TIDAK ADA' }}</td>
            </tr>
        </table>

        <!-- Bagian EVIDEN -->
<div class="section-title">EVIDEN</div>

@php
    $berkasList = [
        'berkas_permohonan' => 'Foto KWH Meter Berlatar Dinding Persil',
        'berkas_ktp' => 'Fotokopi KTP',
        'berkas_npwp' => 'Foto Selfie dengan KTP',
        'berkas_akta' => 'Foto Rumah',
        'info_dtks' => 'Info DTKS'
    ];
@endphp

<table class="evidence-table">
    <tr>
        <th colspan="2">Dokumentasi Berkas</th>
    </tr>
    @foreach(array_chunk($berkasList, 2, true) as $row)  
        <tr>
            @foreach($row as $fieldName => $label)
                <td>
                    <p class="font-weight-bold">{{ $label }}</p>
                    @if (!empty($rubahTarif->$fieldName))
                        <img src="{{  asset('/uploads/rubahtarif/' . $rubahTarif->$fieldName) }}" 
                             style="width: 100%; max-width: 300px; border: 2px solid #ccc;">
                        <p><small>{{ $rubahTarif->$fieldName }}</small></p>
                    @else
                        <p style="color: red;">Tidak ada {{ strtolower($label) }}</p>
                    @endif
                </td>
            @endforeach
            @if(count($row) % 2 != 0)  
                <td></td> 
            @endif
        </tr>
    @endforeach
</table>




        <<div class="section-title">Tanda Tangan</div>
        <div class="signature-section">
            <div class="signature">
                <p>Pelanggan</p>
                <div class="line"></div>
            </div>
            <div class="signature">
                <p>Surveyor (Pengawas)</p>
                <div class="line"></div>
                <p>FAHRIANSYAH</p>
            </div>
            <div class="signature">
                <p>TL/PP</p>
                <div class="line"></div>
                <p>ASTERINA AZIZAH</p>
            </div>
            <div class="signature">
                <p>Manajer ULP</p>
                <div class="line"></div>
                <p>ARLIANSYAH</p>
            </div>
        </div>
</body>
</html>
