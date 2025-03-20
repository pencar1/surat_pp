@extends('layout.layoutadmin')

@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Halaman Perubahan Tarif</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Perubahan Tarif</div>
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
                    <h4>Data Perubahan Tarif</h4>
                        <div class="buttons">
                        <a href="{{ route('admin.rubahtarif.export') }}" class="btn btn-icon icon-left btn-success"><i class="fa fa-file-excel"></i> Export Excel</a>
                        <a href="{{ route('admin.rubahtarif.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>IDPEL</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Tarif Semula</th>
                            <th>Tarif Menjadi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->id_pel }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->tarif_semula }}</td>
                                <td>{{ $d->tarif_menjadi }}</td>
                                <td>
                                    <div class="form-button-action">
                                    <a href="{{ route('admin.rubahtarif.show', $d->id_pel) }}" class="btn btn-link btn-info">
    <i class="fa fa-eye text-white"></i>
</a>


                                        </a>
                                        <a href="{{ route('admin.rubahtarif.edit',  ['id_pel' => $d->id_pel]) }}" data-toggle="tooltip" title="Ubah Data" class="btn btn-link btn-success">
                                         <i class="fa fa-edit text-white"></i>
                                        </a>
                                        <form action="{{ route('admin.rubahtarif.print', ['id_pel' => $d->id_pel]) }}" target="_blank" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="Cetak RubahTarif" class="btn btn-link btn-primary">
                                                <i class="fa fa-print text-white"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.rubahtarif.delete',  ['id_pel' => $d->id_pel]) }}" method="POST" class="d-inline" id="deleteForm-{{ $d->id_pel }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" data-toggle="tooltip" title="Hapus Data" class="btn btn-link btn-danger deleteButton" id="swal-delete-{{ $d->id_pel }}">
                                                <i class="fa fa-times text-white"></i>
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
