@extends('layout.layoutadmin')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Survey Perubahan Tarif</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.rubahtarif') }}">Rubah Tarif</a></div>
        <div class="breadcrumb-item">Data Survey Perubahan Tarif</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
          <form action="{{ route('admin.rubahtarif.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
           value="{{ old($name, $data[$name] ?? '') }}">
    @error($name)
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
@endforeach
<div class="form-group">
                  <label>Perubahan Daya</label><br>
                  @foreach(['Tambah Daya', 'Turun Daya', 'Tetap'] as $value)
                    <label class="mr-3">
                      <input type="radio" name="perubahan_daya" value="{{ $value }}" 
                      {{ old('perubahan_daya', isset($data) ? $data->perubahan_daya : '') == $value ? 'checked' : '' }}>

                      {{ $value }}
                    </label>
                  @endforeach
                  @error('perubahan_daya')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                
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
    <option value="{{ $option }}" {{ trim(old('tarif_semula', $data->tarif_semula ?? '')) == trim($option) ? 'selected' : '' }}>
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
    <option value="{{ $option }}" {{ trim(old('tarif_menjadi', $data->tarif_menjadi ?? '')) == trim($option) ? 'selected' : '' }}>
    {{ $option }}
</option>
    @endforeach
  </select>
  @error('tarif_menjadi')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
                <div class="form-group">
                  <label for="verifikasi_nib">Verifikasi NIB oleh PLN</label><br>
                  @foreach(['ADA', 'TIDAK ADA'] as $option)
                    <label class="mr-3">
                      <input type="radio" name="verifikasi_nib" value="{{ $option }}" {{ old('verifikasi_nib') == $option ? 'checked' : '' }}> {{ $option }}
                    </label>
                  @endforeach
                  @error('verifikasi_nib')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                @foreach ([
                  'Foto KWH meter berlatar dinding persil' => 'berkas_permohonan',
                  'Fotokopi KTP' => 'berkas_ktp',
                  'Foto Selfi KTP' => 'berkas_npwp',
                  'Foto Rumah' => 'berkas_akta',
                  'INFO DTKS' => 'info_dtks'
                ] as $label => $name)
                  <div class="form-group">
                    <label for="{{ $name }}">{{ $label }}</label>
                    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
                    @error($name)
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                @endforeach
                
                <div class="form-group">
                  <label for="tanggal_survey">Tanggal</label>
                  <input type="date" name="tanggal_survey" id="tanggal_survey" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.rubahtarif') }}'">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
