@extends('layout.layoutadmin')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Ubah Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
        <div class="breadcrumb-item">Form Ubah Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <form action="{{ route('pengguna.update', ['id' => $data->idpengguna]) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="card-header">
                  <h4>Data Pengguna</h4>
                </div>
                <div class="card-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $data->nama) }}" required>
                        <div class="invalid-feedback">Nama tidak boleh kosong.</div>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $data->email) }}" required>
                        <div class="invalid-feedback">Harap masukkan email yang valid.</div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', $data->alamat) }}" required>
                        <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- No HP -->
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input type="text" id="nohp" name="nohp" class="form-control" value="{{ old('nohp', $data->nohp) }}" required>
                        <div class="invalid-feedback">Harap masukkan nomor HP yang benar.</div>
                        @error('nohp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="" disabled>Pilih Status</option>
                            <option value="admin" {{ old('status', $data->status) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="karyawan" {{ old('status', $data->status) == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                        </select>
                        <div class="invalid-feedback">Harap pilih status pengguna.</div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Footer -->
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-success saveButton">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('pengguna') }}'">Batal</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
