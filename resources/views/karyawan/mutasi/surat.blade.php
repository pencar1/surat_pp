<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Surat Perintah Kerja</title>
  <style>
    body {
      font-family: Calibri, sans-serif;
      font-size: 10px;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      padding: 20px;
      page-break-after: always; /* Supaya tiap .container jadi halaman terpisah saat di-print */
    }
    .header {
      font-weight: bold;
      margin-bottom: 0;
      text-align: left;
    }
    .header-table {
      margin-top: 0;
    }
    .header-table table {
      width: 100%;
      table-layout: fixed;
      border-collapse: collapse;
    }
    .instruction-list {
      margin-left: 200px;
    }
    .number {
      display: inline-block;
      width: 10px;
    }
    .content p {
      margin: 5px 0;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .table th,
    .table td {
      border: 1px solid black;
      padding: 5px;
      text-align: left;
    }
    .signature {
      margin-top: 40px;
      text-align: right;
    }
    .list-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }
    .list-container ul {
      flex: 1;
      min-width: 200px;
      list-style-type: none;
      padding: 0;
    }
    .list-container li {
      margin-bottom: 5px;
    }
    .bold {
      font-weight: bold;
    }
    /* Tabel dua kolom "Pada Pelanggan" */
    .customer-info {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    .customer-info td {
      padding: 3px 5px;
      vertical-align: top;
    }
    .customer-info td:first-child {
      white-space: nowrap;
    }
    .section-title {
      margin-top: 0;
      margin-bottom: 5px;
    }
    /* Tabel Bergaris (contoh pertama) */
    .my-table {
      width: 100%;
      border-collapse: collapse;
      margin: 15px 0;
    }
    .my-table th, .my-table td {
      border-bottom: 1px solid #000;
      padding: 15px; 
      vertical-align: top;
    }
    .my-table thead th {
      border-top: 1px solid #000;
      font-weight: normal;
      text-align: left;
    }
    /* Tabel dua kolom di bagian atas BA */
    .top-info-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    .top-info-table td {
      vertical-align: top;
      padding: 2px 0;
    }
    /* Garis tebal horizontal (untuk atas & bawah) */
    .thick-line {
      border: none;           /* Hilangkan border default <hr> */
      height: 2px;           /* Ketebalan garis */
      background-color: black;
      margin: 0;             /* Margin default di-nolkan, atur di inline style */
    }
    /* Tabel satu baris, dua kolom: kiri untuk ":" & huruf, kanan untuk "Rayon Card :" */
    .colon-table {
      width: 100%;
      border-collapse: collapse;
    }
    .colon-table td {
      border: none;          /* Tidak ada garis tabel */
      vertical-align: top;
    }
    /* Contoh wadah untuk meniru tinggi total */
    .vertical-block {
      height: 200px; /* ubah sesuai selera atau hapus jika tidak ingin memaksa tinggi */
      display: flex;
      flex-direction: column;
      justify-content: start; /* ratakan ke atas */
    }
    /* Garis mendatar untuk baris T */
    .horizontal-line {
      display: inline-block; 
      width: 150px;           /* panjang garis */
      height: 2px;           /* ketebalan garis */
      background-color: black;
      vertical-align: middle; /* sejajarkan dengan huruf T */
      margin-right: 3px;     /* jarak sedikit sebelum huruf T */
    }
    .signature-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px; /* Jarak dari elemen sebelumnya */
    }
    .signature-table td {
      width: 33%; /* Bagi rata jadi tiga kolom */
      text-align: center; /* Teks rata tengah */
      vertical-align: top; /* Mulai teks dari atas */
      padding: 10px; /* Spasi dalam sel */
    }
    .spacer {
      margin-top: 50px; /* Ruang untuk tanda tangan */
      display: block;
    }
  </style>
</head>
<body>

  <!-- Halaman 1: Surat Perintah Kerja -->
  <div class="container">
    <div class="header">
      PT. PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN TENGAH<br>
      <span style="font-weight: normal;">UP3 BANJARMASIN</span><br>
    </div>

    <div class="header-table">
      <table>
        <tr>
          <td style="text-align: left;">ULP BANJARBARU</td>
          <td style="text-align: center;">
            NO. SPK: 22120/VI-03/{{ \Carbon\Carbon::parse($tanggal_cetak)->format('dmY') }}-
          </td>
        </tr>
      </table>
    </div>

    <h3 style="text-align: center; font-weight: normal; margin-top: 30px;">
      SURAT PERINTAH KERJA
    </h3>
    <hr style="width: 50%; border: 1px solid black; margin: auto;">

    <p style="margin-top: 30px">Diperintahkan Kepada</p>
    <div class="instruction-list">
      <span class="number">1.</span> ...........................................................<br>
      <span class="number">2.</span> ...........................................................<br>
      <span class="number">3.</span> ...........................................................
    </div>

    <h4 style="font-weight: normal;">Untuk Melaksanakan Pemasangan/Penyambungan/Pembongkaran: (9)</h4>
    <table style="width: 100%;">
      <tr>
        <td style="width: 50%; vertical-align: top;">
          <ol>
            <li style="margin-bottom: 15px;">Penyambungan Baru (Mutasi A)</li>
            <li style="margin-bottom: 15px;">Perubahan Golongan Tarif (Mutasi B)</li>
            <li style="margin-bottom: 15px;">Perubahan Daya (Mutasi E)</li>
            <li style="margin-bottom: 15px;">APP (Mutasi J)</li>
            <li style="margin-bottom: 15px;">Trafo Arus, Trafo Tegangan, Faktor Kali Meter (Mutasi K)</li>
          </ol>
        </td>
        <td style="width: 50%; vertical-align: top;">
          <ol start="6">
            <li style="margin-bottom: 15px;">Gardu, Tiang/SLP/SMP/SLTM/SLTT (Mutasi L)</li>
            <li style="margin-bottom: 15px;">Pasang Kembali (Mutasi P)</li>
            <li style="margin-bottom: 15px;">Penyambungan Sementara</li>
            <li style="margin-bottom: 15px;">Bongkar Rampung/Tunggakan Rekening Listrik</li>
          </ol>
        </td>
      </tr>
    </table>

    <p class="section-title">Pada Pelanggan</p>
    <table class="customer-info">
      <tr>
        <td>N a m a</td>
        <td>: {{ $mutasi->namapel }}</td>
        <td style="text-align: right;">Nama Gardu/Tiang</td>
        <td>: 0</td>
      </tr>
      <tr>
        <td>A l a m a t</td>
        <td>: {{ $mutasi->alamatpel }}</td>
        <td style="text-align: right;">Kode Kedudukan</td>
        <td>: 0</td>
      </tr>
      @php
      $bulan = [
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember',
      ];

      function convertMonth($dateStr, $bulan) {
          $parts = explode('-', $dateStr);
          if (count($parts) == 2 && isset($bulan[$parts[0]])) {
              return strtoupper($bulan[$parts[0]]) . ' ' . $parts[1];
          }
          return $dateStr;
      }
      @endphp
      <tr>
          <td>ID. Pelanggan</td>
          <td>: {{ $mutasi->idpel }}</td>
          <td style="text-align: right;">Bulan</td>
          <td>: {{ convertMonth($mutasi->bulanawal, $bulan) }} s/d {{ convertMonth($mutasi->bulanakhir, $bulan) }}</td>
      </tr>
      <tr>
        <td>Nomor Meter</td>
        <td>: -</td>
        <td style="text-align: right;">Jumlah Lembar</td>
        <td>: {{ $mutasi->lembar }}</td>
      </tr>
      <tr>
        <td>Tarip / Daya</td>
        <td>: {{ $mutasi->tarif }}/{{ $mutasi->daya }}</td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <p>Dengan Data Pendukung:</p>
    <table class="my-table">
      <thead>
        <tr>
          <th>NO</th>
          <th style="text-align: center;">URAIAN</th>
          <th style="text-align: center;">TANGGAL</th>
          <th style="text-align: center;">NOMOR</th>
          <th style="text-align: center;">KETERANGAN</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>: 1. :</td>
          <td></td>
          <td>:</td>
          <td>:</td>
          <td>:</td>
        </tr>
        <tr>
          <td>: 2. :</td>
          <td></td>
          <td>:</td>
          <td>:</td>
          <td>:</td>
        </tr>
        <tr>
          <td>: 3. :</td>
          <td></td>
          <td>:</td>
          <td>:</td>
          <td>:</td>
        </tr>
        <tr>
          <td>: 4. :</td>
          <td></td>
          <td>:</td>
          <td>:</td>
          <td>:</td>
        </tr>
        <tr>
          <td>: 5. :</td>
          <td></td>
          <td>:</td>
          <td>:</td>
          <td>:</td>
        </tr>
      </tbody>
    </table>

    <!-- Bagian Berita Acara Pelaksanaan & Catatan -->
    <table style="width: 100%; margin-top: 50px;">
      <tr>
        <td style="vertical-align: top;">
          Berita Acara Pelaksanaan : <br><br>
          Catatan :
        </td>
        @php
          $today = \Carbon\Carbon::now();
        @endphp
        <td style="text-align: center; vertical-align: top;">
          BANJARBARU, {{ $today->format('d') }} {{ strtoupper($today->locale('id')->isoFormat('MMMM')) }} {{ $today->format('Y') }}<br>
          MANAJER<br><br><br>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: bottom; padding-top: 30px;">
          TUL I-09
        </td>
        <td style="text-align: center; vertical-align: bottom; padding-top: 30px;">
          ARLIANSAH
        </td>
      </tr>
    </table>
  </div>

  <!-- Halaman 2: Berita Acara -->
  <div class="container">
    <!-- BAGIAN ATAS: PT. PLN (PERSERO) di kiri, Telp. Gangguan/Informasi di kanan -->
    <div class="header">
      PT. PLN (PERSERO) <br>
      WILAYAH KALIMANTAN SELATAN DAN TENGAH<br>
    </div>
    <div class="header-table">
      <table style="width: 100%; table-layout: fixed;">
        <tr>
          <td style="width: 60%; text-align: left;">UP3 BANJARMASIN</td>
          <td style="width: 40%; text-align: left;">Telp. Gangguan/Informasi : 123</td>
        </tr>
        <tr>
          <td style="text-align: left;">ULP BANJARBARU</td>
          <td style="text-align: left;">Telepon : </td>
        </tr>
      </table>
    </div>

    <div style="text-align: center; margin-top: 30px; font-weight: bold;">
      BERITA ACARA
    </div>
    <hr style="width: 50%; border: 1px solid black; margin: auto; margin-top: 5px;">
    <div style="text-align: center; font-weight: normal; margin-top: 5px;">
      PEMUTUSAN RAMPUNG SAMBUNGAN RUMAH (SR) DAN APP<br>
      NO. SPK : 22120/VI-03/{{ \Carbon\Carbon::parse($tanggal_cetak)->format('dmY') }}-BA.PSR/RMK/{{ \Carbon\Carbon::now()->format('d-m-Y') }}
    </div>

    @php
      $today = \Carbon\Carbon::now()->locale('id');
    @endphp

    <p style="width: 70%; margin-top: 20px; text-align: justify;">
      Pada hari ini, {{ $today->isoFormat('dddd') }} Tanggal {{ $today->format('d') }} Bulan {{ $today->isoFormat('MMMM') }} Tahun {{ $today->format('Y') }} telah dilaksanakan pemutusan rampung sambungan rumah (SR) 
      karena telah menunggak rekening listrik sesuai TUL. VI-03 22120/VI-03/{{ \Carbon\Carbon::parse($tanggal_cetak)->format('dmY') }}- dan PK (TUL I-09) 
      No TUL. VI-03 22120/VI-03/{{ \Carbon\Carbon::parse($tanggal_cetak)->format('dmY') }}- tanggal {{ \Carbon\Carbon::now()->format('d-m-Y') }}
    </p>

    <p class="section-title" style="margin-top: 20px;">Pada Pelanggan</p>
    <table class="customer-info">
      <tr>
        <td>N a m a</td>
        <td>: {{ $mutasi->namapel }}</td>
        <td style="text-align: right;">Nama Gardu/Tiang</td>
        <td>: 0</td>
      </tr>
      <tr>
        <td>A l a m a t</td>
        <td>: {{ $mutasi->alamatpel }}</td>
        <td style="text-align: right;">Kode Kedudukan</td>
        <td>: 0</td>
      </tr>
      <tr>
        <td>ID. Pelanggan</td>
        <td>: {{ $mutasi->idpel }}</td>
        <td style="text-align: right;">Bulan</td>
        <td>: {{ convertMonth($mutasi->bulanawal, $bulan) }} s/d {{ convertMonth($mutasi->bulanakhir, $bulan) }}</td>
      </tr>
      <tr>
        <td>Nomor Meter</td>
        <td>: -</td>
        <td style="text-align: right;">Jumlah Lembar</td>
        <td>: {{ $mutasi->lembar }}</td>
      </tr>
      <tr>
        <td>Tarip / Daya</td>
        <td>: {{ $mutasi->tarif }}/{{ $mutasi->daya }}</td>
        <td style="text-align: right;">Tunggakan</td>
        <td>: Rp.{{ $mutasi->rptag3lembar }}</td>
      </tr>
    </table>

    <p class="section-title" style="margin-top: 20px;">Material yang dibongkar yaitu:</p>
    <table style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="width: 40%; vertical-align: top;">
          1. KWH Meter 1 / 3 Phase,<br>
          &nbsp;&nbsp;&nbsp;Nomor Register<br>
          2. Papan Meter / 0<br>
          3. MCB ............................<br>
          4. Twisted ........................<br>
          5. Duplex ..........................<br>
          6. Paralel Group ...................<br>
          7. Piercing Connector ..............<br>
          8. .................................  
        </td>
        <td style="width: 20%; vertical-align: top;">
          Amp. / Amp <br>
          Phasa<br>
          Amp<br>
          mm2<br>
          mm2<br>
          mm2<br>
          mm2<br>
          mm2
        </td>
        <td style="width: 40%; vertical-align: top;">
          Merek : ...........................<br>
          Angka meter saat dicabut : .................<br>
          : .......................... Buah<br>
          : .......................... Meter<br>
          : .......................... Meter<br>
          : .......................... Buah<br>
          : .......................... Buah<br>
          : ..........................
        </td>
      </tr>
    </table>

    <hr class="thick-line" style="width: 70%; margin-top: 20px; margin-bottom: 20px;">
    <table class="colon-table">
      <tr style="height: 180px;">
        <td style="width: 70%;">
          <div class="vertical-block" style="text-align: center;">
            <p>U</p>
            <p>:</p>
            <p>:</p>
            <p><span class="horizontal-line"></span>T</p>
            <p>:</p>
            <p>:</p>
            <p>S</p>
          </div>
        </td>
        <td style="width: 30%; text-align: left;">
          Rayon Card :
        </td>
      </tr>
    </table>
    <hr class="thick-line" style="width: 70%;">

    <!-- Tambahkan dua garis + teks di antaranya -->
    <!-- Teks pertama -->
    <p>Gambar situasi diisi lengkap dengan no. pelanggan rumah disebelah kiri, kanan (yang terdekat) dengan rumah di putus rampung</p>
    <!-- Garis kedua -->
    <hr class="thick-line" style="width: 70%;">
    <!-- Teks kedua -->
    <p>Demikian Berita Acara Pemutusan Rampung SR dan APP ini dibuat dengan sebenarnya untuk dapat di pergunakan Seperlunya</p>
    <!-- /END Bagian Baru -->

    <table class="signature-table">
    <tr>
        <!-- Kolom Kiri -->
        <td>
        <p>Diketahui Oleh:</p>
        <p>Manager</p>
        <br><br> <!-- Spasi tambahan untuk tempat tanda tangan -->
        <p>ARLIANSAH</p>
        </td>
        
        <!-- Kolom Tengah -->
        <td>
        <p>Penghuni Rumah</p>
        <br><br> <!-- Spasi tambahan untuk tempat tanda tangan -->
        <p style="margin-top: 30px;">( ................................ )</p>
        </td>
        
        <!-- Kolom Kanan -->
        <td>
        <p>BANJARBARU, {{ $today->format('d') }} {{ strtoupper($today->locale('id')->isoFormat('MMMM')) }} {{ $today->format('Y') }}<br>
        Petugas Bongkar</p>
        <br><br>
        <!-- Tanda tangan petugas 1 -->
        <p style="margin-top: -20px;">( ................................ ) &nbsp;&nbsp; 1. ................................</p>
        <!-- Tanda tangan petugas 2 -->
        <p style="margin-top: 25px;">( ................................ ) &nbsp;&nbsp; 2. ................................</p>
        </td>
    </tr>
    </table>
  </div>

  <!-- Halaman 3: Dokumentasi Foto -->
    <div class="container" style="page-break-after: avoid;">
    <p style="text-align: center;">
    <img src="{{ public_path('images/mutasi/' . $mutasi->fotorumah) }}" style="width: 100%; max-width: 500px;">
    </p>
    <p style="text-align: center; line-height: 1.1; font-size: 14px; margin: 0;">
      {{ $mutasi->idpel }}
    </p>
    <p style="text-align: center; line-height: 1.1; font-size: 14px; margin: 0;">
      {{ $mutasi->namapel }}
    </p>
    <p style="text-align: center; line-height: 1.1; font-size: 14px; margin: 0;">
      {{ $mutasi->titikkoordinat }}
    </p>
  </div>

</body>
</html>
