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
            <form action="{{ route('admin.pengguna.update', ['id' => $data->idpel]) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
              @csrf
              @method('PUT')
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
                    <input type="text" id="idpel" class="form-control" value="{{ $data->idpel }}" disabled>
                </div>

                <!-- Nama Pelanggan-->
                <div class="form-group">
                    <label for="namapel">Nama Pelanggan</label>
                    <input type="text" id="namapel" class="form-control" value="{{ $data->namapel }}" disabled>
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="alamatpel">Alamat</label>
                    <input type="text" id="alamatpel" class="form-control" value="{{  $data->alamatpel }}" disabled>
                </div>

                <!-- Tarif -->
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <input type="text" id="tarif" class="form-control" value="{{  $data->tarif }}" disabled>
                </div>

                <!-- Daya -->
                <div class="form-group">
                    <label for="daya">Daya</label>
                    <input type="text" id="daya" class="form-control" value="{{  $data->daya }}" disabled>
                </div>

                <!-- Ampere -->
                <div class="form-group">
                    <label for="amper">Amper</label>
                    <input type="text" id="amper" class="form-control" value="{{  $data->amper }}" disabled>
                </div>

                <!-- Bulan Awal -->
                <div class="form-group">
                    <label for="bulanawal">Bulan Awal</label>
                    <input type="text" id="bulanawal" class="form-control" value="{{  $data->bulanawal }}" disabled>
                </div>

                <!-- Bulan Akhir -->
                <div class="form-group">
                    <label for="bulanakhir">Bulan Akhir</label>
                    <input type="text" id="bulanakhir" class="form-control" value="{{  $data->bulanakhir }}" disabled>
                </div>

                <!-- Lembar -->
                <div class="form-group">
                    <label for="lembar">Lembar</label>
                    <input type="text" id="lembar" class="form-control" value="{{  $data->lembar }}" disabled>
                </div>

                <!-- RP TAG 3 Lembar -->
                <div class="form-group">
                    <label for="rptag3lembar">RP TAG 3 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rptag3lembar" class="form-control" value="{{  $data->rptag3lembar }}" disabled>
                    </div>
                </div>

                <!-- RP BK 3 Lembar -->
                <div class="form-group">
                    <label for="rpbk3lembar">RP BK 3 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rpbk3lembar" class="form-control" value="{{  $data->rpbk3lembar }}" disabled>
                    </div>
                </div>

                <!-- RP TOT 3 Lembar -->
                <div class="form-group">
                    <label for="rptot3lembar">RP TOT 3 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rptot3lembar" class="form-control" value="{{  $data->rptot3lembar }}" disabled>
                    </div>
                </div>

                <!-- Kode Ujung PK -->
                <div class="form-group">
                    <label for="kodeujungpk">Kode Ujung PK</label>
                    <input type="text" id="kodeujungpk" class="form-control" value="{{  $data->kodeujungpk }}" disabled>
                </div>

                <!-- RP TAG 1 Lembar -->
                <div class="form-group">
                    <label for="rptag1lembar">RP TAG 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rptag1lembar" class="form-control" value="{{  $data->rptag1lembar }}" disabled>
                    </div>
                </div>

                <!-- RP BK 1 Lembar -->
                <div class="form-group">
                    <label for="rpbk1lembar">RP BK 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rpbk1lembar" class="form-control" value="{{  $data->rpbk1lembar }}" disabled>
                    </div>
                </div>

                <!-- RP TOT 1 Lembar -->
                <div class="form-group">
                    <label for="rptot1lembar">RP TOT 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="rptot1lembar" class="form-control" value="{{  $data->rptot1lembar }}" disabled>
                    </div>
                </div>

                <!-- Titik Koordinat -->
                <div class="form-group">
                    <label for="titikkoordinat">Titik Koordinat</label>
                    <input type="text" id="titikkoordinat" class="form-control" value="{{  $data->titikkoordinat }}" disabled>
                </div>

              </div>
              <div class="card-footer text-right">
                <a href="{{ route('admin.mutasi') }}" class="btn btn-danger">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
