@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Lihat Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
        <div class="breadcrumb-item">Form Lihat Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <form class="needs-validation" novalidate="">
              <div class="card-header">
                <h4>Data Pengguna</h4>
              </div>
              <div class="card-body">
                <!-- Nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                  <div class="invalid-feedback">Nama tidak boleh kosong.</div>
                </div>
                <!-- Email -->
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Masukkan alamat email" required>
                  <div class="invalid-feedback">Harap masukkan email yang valid.</div>
                </div>
                <!-- Alamat -->
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
                  <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>
                <!-- No HP -->
                <div class="form-group">
                  <label for="no_hp">No HP</label>
                  <input type="text" id="no_hp" class="form-control" placeholder="Masukkan nomor HP" pattern="\d{10,13}" required>
                  <div class="invalid-feedback">Harap masukkan nomor HP dengan benar (10-13 digit).</div>
                </div>
                <!-- Status -->
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" class="form-control" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                  </select>
                  <div class="invalid-feedback">Harap pilih status pengguna.</div>
                </div>
              </div>
              <!-- Footer -->
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
