@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
        <div class="breadcrumb-item">Detail Pengguna</div>
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
              <!-- Nama -->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" class="form-control" value="{{ $data->nama }}" disabled>
              </div>
              <!-- Email -->
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" value="{{ $data->email }}" disabled>
              </div>
              <!-- Alamat -->
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" class="form-control" value="{{ $data->alamat }}" disabled>
              </div>
              <!-- No HP -->
              <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" id="no_hp" class="form-control" value="{{ $data->nohp }}" disabled>
              </div>
              <!-- Status -->
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" class="form-control" value="{{ $data->status }}" disabled>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="{{ route('pengguna') }}" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
