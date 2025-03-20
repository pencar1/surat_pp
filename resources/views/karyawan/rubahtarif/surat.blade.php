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

        <div class="section-title">EVIDEN</div>

        <!-- Bagian IDPEL yang Memohon -->
        <table class="evidence-table">
            <tr>
                <th colspan="2">IDPEL yang Memohon</th>
            </tr>
            <tr>
                <td>
                    <img src="{{ asset('uploads/rubahtarif/' . $rubahTarif->berkas_permohonan) }}" alt="Foto 1"><br>
                    <small>{{ $rubahTarif['berkas_permohonan'] }}</small>
                </td>
                <td>
                    <img src="{{ asset('uploads/rubahtarif/' . $rubahTarif->berkas_ktp) }}" alt="Foto 2"><br>
                    <small>{{ $rubahTarif['berkas_ktp'] }}</small>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="{{ asset('uploads/rubahtarif/' . $rubahTarif->berkas_npwp) }}" alt="Foto 3"><br>
                    <small>{{ $rubahTarif['berkas_npwp'] }}</small>
                </td>
            </tr>
        </table>

        <!-- Bagian IDPEL Rumah/Hunian -->
        <table class="evidence-table">
            <tr>
                <th colspan="2">IDPEL rumah/hunian</th>
            </tr>
            <tr>
                <td>
                    <img src="{{ asset('uploads/rubahtarif/' . $rubahTarif->berkas_akta) }}" alt="Foto 4"><br>
                    <small>{{ $rubahTarif['berkas_akta'] }}</small>
                </td>
                <td>
                    <img src="{{ asset('uploads/rubahtarif/' . $rubahTarif->info_dtks) }}" alt="Foto 5"><br>
                    <small>{{ $rubahTarif['info_dtks'] }}</small>
                </td>
            </tr>
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
