@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Lihat Mutasi N</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.mutasi') }}">Mutasi N</a></div>
        <div class="breadcrumb-item">Form Lihat Mutasi N</div>
      </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h4>Data Pengguna</h4>
                </div>
                <div class="card-body">

                  <!-- Foto Rumah -->
                  <div class="form-group text-center">
                      @if ($data->fotorumah)
                          <img src="{{ asset('images/mutasi/' . $data->fotorumah) }}" alt="Foto Rumah" style="display: block; max-width: 300px; margin: 10px auto; border: 2px solid #ccc;">
                      @else
                          <p>Tidak ada foto rumah</p>
                      @endif
                  </div>

                  <!-- Id Pel -->
                  <div class="form-group">
                      <label for="idpel">Id Pelanggan</label>
                      <div class="form-control">{{ $data->idpel }}</div>
                  </div>

                  <!-- Nama Pelanggan-->
                  <div class="form-group">
                      <label for="namapel">Nama Pelanggan</label>
                      <div class="form-control">{{ $data->namapel }}</div>
                  </div>

                  <!-- Alamat -->
                  <div class="form-group">
                      <label for="alamatpel">Alamat</label>
                      <div class="form-control">{{ $data->alamatpel }}</div>
                  </div>

                  <!-- Tarif -->
                  <div class="form-group">
                      <label for="tarif">Tarif</label>
                      <div class="form-control">{{ $data->tarif }}</div>
                  </div>

                  <!-- Daya -->
                  <div class="form-group">
                      <label for="daya">Daya</label>
                      <div class="form-control">{{ $data->daya }}</div>
                  </div>

                  <!-- Ampere -->
                  <div class="form-group">
                      <label for="amper">Amper</label>
                      <div class="form-control">{{ $data->amper }}</div>
                  </div>

                  <!-- Bulan Awal -->
                  <div class="form-group">
                      <label for="bulanawal">Bulan Awal</label>
                      <div class="form-control">{{ $data->bulanawal }}</div>
                  </div>

                  <!-- Bulan Akhir -->
                  <div class="form-group">
                      <label for="bulanakhir">Bulan Akhir</label>
                      <div class="form-control">{{ $data->bulanakhir }}</div>
                  </div>

                  <!-- Lembar -->
                  <div class="form-group">
                      <label for="lembar">Lembar</label>
                      <div class="form-control">{{ $data->lembar }}</div>
                  </div>

                  <!-- RP TAG 3 Lembar -->
                  <div class="form-group">
                      <label for="rptag3lembar">RP TAG 3 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rptag3lembar }}</div>
                      </div>
                  </div>

                  <!-- RP BK 3 Lembar -->
                  <div class="form-group">
                      <label for="rpbk3lembar">RP BK 3 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rpbk3lembar }}</div>
                      </div>
                  </div>

                  <!-- RP TOT 3 Lembar -->
                  <div class="form-group">
                      <label for="rptot3lembar">RP TOT 3 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rptot3lembar }}</div>
                      </div>
                  </div>

                  <!-- Kode Ujung PK -->
                  <div class="form-group">
                      <label for="kodeujungpk">Kode Ujung PK</label>
                      <div class="form-control">{{ $data->kodeujungpk }}</div>
                  </div>

                  <!-- RP TAG 1 Lembar -->
                  <div class="form-group">
                      <label for="rptag1lembar">RP TAG 1 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rptag1lembar }}</div>
                      </div>
                  </div>

                  <!-- RP BK 1 Lembar -->
                  <div class="form-group">
                      <label for="rpbk1lembar">RP BK 1 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rpbk1lembar }}</div>
                      </div>
                  </div>

                  <!-- RP TOT 1 Lembar -->
                  <div class="form-group">
                      <label for="rptot1lembar">RP TOT 1 Lembar</label>
                      <div class="input-group">
                          <span class="input-group-text">Rp.</span>
                          <div class="form-control">{{ $data->rptot1lembar }}</div>
                      </div>
                  </div>

                  <!-- Titik Koordinat -->
                  <div class="form-group">
                      <label for="titikkoordinat">Titik Koordinat</label>
                      <div class="form-control">{{ $data->titikkoordinat }}</div>
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="{{ route('admin.mutasi') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection
