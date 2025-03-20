@extends('layout.layoutkaryawan')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Perubahan Tarif</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('karyawan.dashboard') }}">Dashboard</a>
                </div>
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
                                                        <a href="{{ route('karyawan.rubahtarif.show', $d->id_pel) }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Lihat Detail">
                                                            <i class="fa fa-eye text-white"></i>
                                                        </a>

                                                        <a href="{{ route('karyawan.rubahtarif.edit', ['id_pel' => $d->id_pel]) }}" class="btn btn-link btn-success" data-toggle="tooltip" title="Ubah Data">
                                                            <i class="fa fa-edit text-white"></i>
                                                        </a>

                                                        <form action="{{ route('karyawan.rubahtarif.print', ['id_pel' => $d->id_pel]) }}" target="_blank" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link btn-primary" data-toggle="tooltip" title="Cetak RubahTarif">
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

@endsection
