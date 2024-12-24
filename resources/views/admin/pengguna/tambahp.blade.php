@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Tambah Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
        <div class="breadcrumb-item">Form Tambah Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <form action="{{ route('pengguna.store') }}" method="POST" class="needs-validation">
              @csrf
              <div class="card-header">
                <h4>Data Pengguna</h4>
              </div>
              <div class="card-body">

                <!-- Nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan alamat email" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Alamat -->
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap" value="{{ old('alamat') }}">
                  @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- No HP -->
                <div class="form-group">
                  <label for="no_hp">No HP</label>
                  <input type="text" name="nohp" id="no_hp" class="form-control @error('nohp') is-invalid @enderror" placeholder="Masukkan nomor HP" value="{{ old('nohp') }}">
                  @error('nohp')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="" disabled {{ old('status') ? '' : 'selected' }}>Pilih Status</option>
                    <option value="admin" {{ old('status') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="karyawan" {{ old('status') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                  </select>
                  @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('pengguna') }}'">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
