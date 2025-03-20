@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Lihat Rubah Tarif</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.rubahtarif') }}">Rubah Tarif</a></div>
        <div class="breadcrumb-item">Form Lihat Rubah Tarif</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Rubah Tarif</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="idpel">Id Pelanggan</label>
                <div class="form-control">
                  @isset($data->id_pel) {{ $data->id_pel }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="nama">Nama</label>
                <div class="form-control">
                  @isset($data->nama) {{ $data->nama }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <div class="form-control">
                  @isset($data->alamat) {{ $data->alamat }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="no_hp">No HP Pelanggan</label>
                <div class="form-control">
                  @isset($data->no_hp) {{ $data->no_hp }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="nik_pelanggan">NIK Pelanggan</label>
                <div class="form-control">
                  @isset($data->nik_pelanggan) {{ $data->nik_pelanggan }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="tarif_semula">Tarif/Daya Semula</label>
                <div class="form-control">
                  @isset($data->tarif_semula) {{ $data->tarif_semula }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="tarif_menjadi">Tarif/Daya Menjadi</label>
                <div class="form-control">
                  @isset($data->tarif_menjadi) {{ $data->tarif_menjadi }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="perubahan_daya">Perubahan Daya</label>
                <div class="form-control">
                  @isset($data->perubahan_daya) {{ $data->perubahan_daya }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="nib">Nomor Induk Berusaha (NIB)</label>
                <div class="form-control">
                  @isset($data->nib) {{ $data->nib }} @else - @endisset
                </div>
              </div>

              <div class="form-group">
                <label for="verifikasi_nib">Verifikasi NIB oleh PLN</label>
                <div class="form-control">
                  @isset($data->verifikasi_nib) {{ $data->verifikasi_nib }} @else - @endisset
                </div>
              </div>

                <!-- Kelengkapan Berkas -->
                @php
    $berkasList = [
        'berkas_permohonan' => 'Foto KWH Meter Berlatar Dinding Persil',
        'berkas_ktp' => 'Fotokopi KTP',
        'berkas_npwp' => 'Foto Selfie dengan KTP',
        'berkas_akta' => 'Foto Rumah',
        'info_dtks' => 'Info DTKS'
    ];
@endphp

@foreach ($berkasList as $fieldName => $label)
    <div class="form-group text-center">
        <label for="{{ $fieldName }}" class="font-weight-bold">{{ $label }}</label>
        <br>
        @if (!empty($data->$fieldName))
            <img src="{{ asset('uploads/rubahtarif/' . $data->$fieldName) }}" alt="{{ $label }}" 
                 style="display: block; max-width: 300px; margin: 10px auto; border: 2px solid #ccc;">
            <p><strong>Nama File:</strong> {{ $data->$fieldName }}</p>
        @else
            <p>Tidak ada {{ strtolower($label) }}</p>
        @endif
    </div>
@endforeach
<!-- Akhir tambahan berkas -->

              <div class="form-group">
                <label for="tanggal_survey">Tanggal</label>
                <div class="form-control">
                  @isset($data->tanggal_survey) {{ $data->tanggal_survey }} @else - @endisset
                </div>
              </div>

              <div class="card-footer text-right">
                  <a href="{{ route('admin.rubahtarif') }}" class="btn btn-danger">Kembali</a>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>

</section>
</div>

@endsection
