@extends('layout.layoutadmin')

@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Halaman Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Pengguna</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                {{-- Cek apakah ada pesan sukses --}}
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                {{-- Cek apakah ada pesan error --}}
                @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pengguna</h4>
                        <div class="buttons">
                            <a href="{{ route('admin.pengguna.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->nohp }}</td>
                            <td>{{ $d->status }}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{ route('admin.pengguna.show', ['id' => $d->idpengguna]) }}" data-toggle="tooltip" title="Lihat Pengguna" class="btn btn-link btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.pengguna.edit', ['id' => $d->idpengguna]) }}" data-toggle="tooltip" title="Ubah Pengguna" class="btn btn-link btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.pengguna.delete', ['id' => $d->idpengguna]) }}" method="POST" class="d-inline" id="deleteForm-{{ $d->idpengguna }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-toggle="tooltip" title="Hapus User" class="btn btn-link btn-danger deleteButton" id="swal-delete-{{ $d->idpengguna }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection
