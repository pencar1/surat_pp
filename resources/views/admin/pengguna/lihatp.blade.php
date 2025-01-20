@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.pengguna') }}">Pengguna</a></div>
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
                <div class="form-control">{{ $data->nama }}</div>
              </div>
              <!-- Email -->
              <div class="form-group">
                <label for="email">Email</label>
                <div class="form-control">{{ $data->email }}</div>
              </div>
              <!-- Alamat -->
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <div class="form-control">{{ $data->alamat }}</div>
              </div>
              <!-- No HP -->
              <div class="form-group">
                <label for="no_hp">No HP</label>
                <div class="form-control">{{ $data->nohp }}</div>
              </div>
              <!-- Status -->
              <div class="form-group">
                <label for="status">Status</label>
                <div class="form-control">{{ $data->status }}</div>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="{{ route('admin.pengguna') }}" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
