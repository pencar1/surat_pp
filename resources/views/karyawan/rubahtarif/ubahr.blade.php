@extends('layout.layoutadmin')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Data Survey Perubahan Tarif</h1>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <form action="{{ route('karyawan.rubahtarif.update', ['id_pel' => $data->id_pel]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-header">
                <h4>Formulir Perubahan Tarif</h4>
              </div>

              <div class="card-body">
                
              
                
               <!-- Input Fields -->
@foreach ([
    'ID Pelanggan' => 'id_pel',
    'Nama' => 'nama',
    'Alamat' => 'alamat',
    'No HP Pelanggan' => 'no_hp',
    'NIK Pelanggan' => 'nik_pelanggan',
    'Nomor Induk Berusaha (NIB)' => 'nib'
] as $label => $name)
  <div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" 
           class="form-control @error($name) is-invalid @enderror" 
           value="{{ old($name, $data->$name) }}">
   @error($name)
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
@endforeach

<!-- Pilihan Tarif/Daya Semula -->
<div class="form-group">
  <label for="tarif_semula">Tarif/Daya Semula</label>
  <select name="tarif_semula" id="tarif_semula" class="form-control @error('tarif_semula') is-invalid @enderror">
    <option value="">-- Pilih Tarif/Daya Semula --</option>
    @foreach ([
      'R1/450 VA', 'R1T/450 VA', 'R1/900 VA', 'R1T/900 VA', 'R1/1300 VA', 'R1T/1300 VA', 'R1/2200 VA', 'R1T/2200 VA',
      'R2/3500 VA', 'R2T/3500 VA', 'R2/5500 VA', 'R2T/5500 VA', 'R3/6600 VA ke atas', 'R3T/6600 VA ke atas',
      'B1/450 VA', 'B1T/450 VA', 'B1/900 VA', 'B1T/900 VA', 'B1/1300 VA', 'B1T/1300 VA', 'B1/2200 VA', 'B1T/2200 VA',
      'I1/450 VA', 'I1T/450 VA', 'I1/900 VA', 'I1T/900 VA', 'I1/1300 VA', 'I1T/1300 VA', 'I1/2200 VA', 'I1T/2200 VA',
      'P1/450 VA', 'P1T/450 VA', 'P1/900 VA', 'P1T/900 VA', 'P1/1300 VA', 'P1T/1300 VA', 'P1/2200 VA', 'P1T/2200 VA'
    ] as $option)
      <option value="{{ $option }}" {{ old('tarif_semula', $data->tarif_semula) == $option ? 'selected' : '' }}>
        {{ $option }}
      </option>
    @endforeach
  </select>
  @error('tarif_semula')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<!-- Pilihan Tarif/Daya Menjadi -->
<div class="form-group">
  <label for="tarif_menjadi">Tarif/Daya Menjadi</label>
  <select name="tarif_menjadi" id="tarif_menjadi" class="form-control @error('tarif_menjadi') is-invalid @enderror">
    <option value="">-- Pilih Tarif/Daya Menjadi --</option>
    @foreach ([
      'R1/450 VA', 'R1T/450 VA', 'R1/900 VA', 'R1T/900 VA', 'R1/1300 VA', 'R1T/1300 VA', 'R1/2200 VA', 'R1T/2200 VA',
      'R2/3500 VA', 'R2T/3500 VA', 'R2/5500 VA', 'R2T/5500 VA', 'R3/6600 VA ke atas', 'R3T/6600 VA ke atas',
      'B1/450 VA', 'B1T/450 VA', 'B1/900 VA', 'B1T/900 VA', 'B1/1300 VA', 'B1T/1300 VA', 'B1/2200 VA', 'B1T/2200 VA',
      'I1/450 VA', 'I1T/450 VA', 'I1/900 VA', 'I1T/900 VA', 'I1/1300 VA', 'I1T/1300 VA', 'I1/2200 VA', 'I1T/2200 VA',
      'P1/450 VA', 'P1T/450 VA', 'P1/900 VA', 'P1T/900 VA', 'P1/1300 VA', 'P1T/1300 VA', 'P1/2200 VA', 'P1T/2200 VA'
    ] as $option)
      <option value="{{ $option }}" {{ old('tarif_menjadi', $data->tarif_menjadi) == $option ? 'selected' : '' }}>
        {{ $option }}
      </option>
    @endforeach
  </select>
  @error('tarif_menjadi')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
                <!-- Perubahan Daya -->
                <div class="form-group">
                  <label>Perubahan Daya</label><br>
                  @foreach(['Tambah Daya', 'Turun Daya', 'Tetap'] as $value)
                    <label class="mr-3">
                      <input type="radio" name="perubahan_daya" value="{{ $value }}" 
                             {{ old('perubahan_daya', $data->perubahan_daya) == $value ? 'checked' : '' }}> 
                      {{ $value }}
                    </label>
                  @endforeach
                  @error('perubahan_daya')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- Verifikasi NIB -->
                <div class="form-group">
                  <label>Verifikasi NIB oleh PLN</label><br>
                  @foreach(['ADA', 'TIDAK ADA'] as $option)
                    <label class="mr-3">
                      <input type="radio" name="verifikasi_nib" value="{{ $option }}" 
                             {{ old('verifikasi_nib', $data->verifikasi_nib) == $option ? 'checked' : '' }}> 
                      {{ $option }}
                    </label>
                  @endforeach
                  @error('verifikasi_nib')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
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

        <!-- Input File untuk Ganti Foto -->
        <input type="file" name="{{ $fieldName }}" id="{{ $fieldName }}" 
               class="form-control mt-2 @error($fieldName) is-invalid @enderror">
        @error($fieldName)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach

                <!-- Tanggal -->
                <div class="form-group">
                  <label for="tanggal_survey">Tanggal</label>
                  <input type="date" name="tanggal_survey" id="tanggal_survey" 
                         class="form-control @error('tanggal_survey') is-invalid @enderror" 
                         value="{{ old('tanggal_survey', $data->tanggal_survey) }}">
                  @error('tanggal_survey')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update Data</button>
                <button type="reset" class="btn btn-danger" 
                        onclick="window.location.href='{{ route('karyawan.rubahtarif') }}'">Batal</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
