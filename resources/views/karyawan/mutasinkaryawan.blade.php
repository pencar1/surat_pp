@extends('layout.layoutkaryawan')

@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Halaman Mutasi N</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('karyawan.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Mutasi N</div>
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
                    <h4>Data Mutasi N</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>IDPEL</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Status Cetak</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->idpel }}</td>
                                <td>{{ $d->namapel }}</td>
                                <td>{{ $d->alamatpel }}</td>
                                <td>
                                    @if($d->status_cetak === 'Belum Dicetak')
                                        <span class="badge badge-warning">Belum Dicetak</span>
                                    @else
                                        <span class="badge badge-success">Sudah Dicetak</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="{{ route('karyawan.mutasi.show', ['id' => $d->idpel]) }}" data-toggle="tooltip" title="Lihat Mutasi" class="btn btn-link btn-info">
                                            <i class="fa fa-eye text-white"></i>
                                        </a>
                                        <a href="{{ route('karyawan.mutasi.edit', ['id' => $d->idpel]) }}" data-toggle="tooltip" title="Ubah Mutasi" class="btn btn-link btn-success">
                                            <i class="fa fa-edit text-white"></i>
                                        </a>
                                        <form action="{{ route('karyawan.mutasi.print', ['id' => $d->idpel]) }}" target="_blank" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="Cetak Mutasi" class="btn btn-link btn-primary">
                                                <i class="fa fa-print text-white"></i>
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
