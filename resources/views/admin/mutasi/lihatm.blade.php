@extends('layout.layoutadmin')

@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Tambah Mutasi N</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.mutasi') }}">Mutasi N</a></div>
        <div class="breadcrumb-item">Form Tambah Mutasi N</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <form action="#" method="POST" class="needs-validation">
              @csrf
              <div class="card-header">
                <h4>Data Pengguna</h4>
              </div>
              <div class="card-body">

                <!-- Id Pel -->
                <div class="form-group">
                    <label for="idpel">Id Pelanggan</label>
                    <input type="text" name="idpel" id="idpel" class="form-control @error('idpel') is-invalid @enderror" placeholder="Masukkan Id Pelanggan" value="{{ old('idpel') }}">
                    @error('idpel')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kode -->
                <div class="form-group">
                    <label for="kode">kode</label>
                    <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan Kode Lengkap" value="{{ old('kode') }}">
                    @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- NO RBM -->
                <div class="form-group">
                    <label for="norbm">NO RBM</label>
                    <input type="text" name="norbm" id="norbm" class="form-control @error('norbm') is-invalid @enderror" placeholder="Masukkan NO RBM" value="{{ old('norbm') }}">
                    @error('norbm')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Gardu -->
                <div class="form-group">
                    <label for="namagardu">Nama Gardu</label>
                    <input type="text" name="namagardu" id="namagardu" class="form-control @error('namagardu') is-invalid @enderror" placeholder="Masukkan Nama Gardu" value="{{ old('namagardu') }}">
                    @error('namagardu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Pelanggan-->
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Pelanggan" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Lengkap" value="{{ old('alamat') }}">
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gol -->
                <div class="form-group">
                    <label for="gol">Golongan</label>
                    <input type="text" name="gol" id="gol" class="form-control @error('gol') is-invalid @enderror" placeholder="Masukkan Golongan" value="{{ old('gol') }}">
                    @error('gol')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tarif -->
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <select name="tarif" id="tarif" class="form-control @error('tarif') is-invalid @enderror">
                        <option value="" disabled {{ old('tarif') ? '' : 'selected' }}>Pilih Tarif</option>
                        <option value="r1" {{ old('tarif') == 'r1' ? 'selected' : '' }}>R1</option>
                        <option value="r1m" {{ old('tarif') == 'r1m' ? 'selected' : '' }}>R1M</option>
                    </select>
                    @error('tarif')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Daya -->
                <div class="form-group">
                    <label for="daya">Daya</label>
                    <select name="daya" id="daya" class="form-control @error('daya') is-invalid @enderror">
                        <option value="" disabled {{ old('daya') ? '' : 'selected' }}>Pilih Daya</option>
                        <option value="450" {{ old('daya') == '450' ? 'selected' : '' }}>450</option>
                        <option value="900" {{ old('daya') == '900' ? 'selected' : '' }}>900</option>
                    </select>
                    @error('daya')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bulan Akhir -->
                <div class="form-group">
                    <label for="bulanakhir">Bulan Akhir</label>
                    <select name="bulanakhir" id="bulanakhir" class="form-control @error('bulanakhir') is-invalid @enderror">
                        <option value="" disabled {{ old('bulanakhir') ? '' : 'selected' }}>Pilih Bulan Akhir</option>
                        @php
                            $currentYear = date('Y'); // Ambil tahun saat ini
                            $months = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            ];
                        @endphp
                        @foreach ($months as $key => $month)
                            <option value="{{ $key }}-{{ $currentYear }}" {{ old('bulanakhir') == "$key-$currentYear" ? 'selected' : '' }}>
                                {{ $month }} {{ $currentYear }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulanakhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bulan Awal -->
                <div class="form-group">
                    <label for="bulanawal">Bulan Awal</label>
                    <select name="bulanawal" id="bulanawal" class="form-control @error('bulanawal') is-invalid @enderror">
                        <option value="" disabled {{ old('bulanawal') ? '' : 'selected' }}>Pilih Bulan Awal</option>
                        @php
                            $currentYear = date('Y'); // Ambil tahun saat ini
                            $months = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            ];
                        @endphp
                        @foreach ($months as $key => $month)
                            <option value="{{ $key }}-{{ $currentYear }}" {{ old('bulanawal') == "$key-$currentYear" ? 'selected' : '' }}>
                                {{ $month }} {{ $currentYear }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulanawal')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lembar -->
                <div class="form-group">
                    <label for="lembar">Lembar</label>
                    <input type="text" name="lembar" id="lembar" class="form-control @error('lembar') is-invalid @enderror" placeholder="Masukkan Lembar">
                    @error('lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP TAG 3 Lembar -->
                <div class="form-group">
                    <label for="rptag1lembar">RP TAG 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rptag1lembar"
                            id="rptag1lembar"
                            class="form-control @error('rptag1lembar') is-invalid @enderror"
                            placeholder="Masukkan RP TAG 1 Lembar"
                            value="{{ old('rptag1lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rptag1lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP BK 3 Lembar -->
                <div class="form-group">
                    <label for="rpbk1lembar">RP BK 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rpbk1lembar"
                            id="rpbk1lembar"
                            class="form-control @error('rpbk1lembar') is-invalid @enderror"
                            placeholder="Masukkan RP BK 1 Lembar"
                            value="{{ old('rpbk1lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rpbk1lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP TOT 3 Lembar -->
                <div class="form-group">
                    <label for="rptotlembar">RP TOT Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rptotlembar"
                            id="rptotlembar"
                            class="form-control @error('rptotlembar') is-invalid @enderror"
                            placeholder="Masukkan RP TOT Lembar"
                            value="{{ old('rptotlembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rptotlembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tahun -->
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                        @php
                            $currentYear = 2024; // Tahun default
                            $startYear = $currentYear - 5; // 5 tahun sebelumnya
                            $endYear = $currentYear; // Tahun default sebagai akhir
                        @endphp
                        @for ($year = $endYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}" {{ old('tahun', $currentYear) == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                    @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal PDL -->
                <div class="form-group">
                    <label for="tanggal_pdl">Tanggal PDL</label>
                    <input
                        type="date"
                        name="tanggal_pdl"
                        id="tanggal_pdl"
                        class="form-control @error('tanggal_pdl') is-invalid @enderror"
                        value="{{ old('tanggal_pdl', date('Y-m-d')) }}"
                    >
                    @error('tanggal_pdl')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- No PDL -->
                <div class="form-group">
                    <label for="nopdl">No PDL</label>
                    <input type="text" name="nopdl" id="nopdl" class="form-control @error('nopdl') is-invalid @enderror" placeholder="Masukkan No PDL" value="{{ old('nopdl') }}">
                    @error('nopdl')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- No Urut -->
                <div class="form-group">
                    <label for="nourut">No Urut</label>
                    <input type="text" name="nourut" id="nourut" class="form-control @error('nourut') is-invalid @enderror" placeholder="Masukkan No Urut" value="{{ old('nourut') }}">
                    @error('nourut')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PDL -->
                <div class="form-group">
                    <label for="pdl">PDL</label>
                    <input type="text" name="pdl" id="pdl" class="form-control @error('pdl') is-invalid @enderror" placeholder="Masukkan PDL" value="{{ old('pdl') }}">
                    @error('pdl')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kode Ujung PK -->
                <div class="form-group">
                    <label for="kodeujungpk">Kode Ujung PK</label>
                    <input type="text" name="kodeujungpk" id="kodeujungpk" class="form-control @error('kodeujungpk') is-invalid @enderror" placeholder="Masukkan Kode Ujung PK" value="{{ old('kodeujungpk') }}">
                    @error('kodeujungpk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- BA -->
                <div class="form-group">
                    <label for="ba">BA</label>
                    <input type="text" name="ba" id="ba" class="form-control @error('ba') is-invalid @enderror" placeholder="Masukkan BA" value="{{ old('ba') }}">
                    @error('ba')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ampere -->
                <div class="form-group">
                    <label for="amper">Amper</label>
                    <select name="amper" id="amper" class="form-control @error('amper') is-invalid @enderror">
                        <option value="" disabled {{ old('amper') ? '' : 'selected' }}>Pilih amper</option>
                        <option value="2A" {{ old('amper') == '2A' ? 'selected' : '' }}>2A</option>
                        <option value="4A" {{ old('amper') == '4A' ? 'selected' : '' }}>4A</option>
                    </select>
                    @error('daya')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Supervisor -->
                <div class="form-group">
                    <label for="spv">Supervisor</label>
                    <input
                        type="text"
                        name="spv"
                        id="spv"
                        class="form-control @error('spv') is-invalid @enderror"
                        value="Asterina Azizah"
                        readonly
                    >
                    @error('spv')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Manager -->
                <div class="form-group">
                    <label for="manager">Manager</label>
                    <input
                        type="text"
                        name="manager"
                        id="manager"
                        class="form-control @error('manager') is-invalid @enderror"
                        value="Arliansah"
                        readonly
                    >
                    @error('manager')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP TAG 1 Lembar -->
                <div class="form-group">
                    <label for="rptag1lembar">RP TAG 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rptag1lembar"
                            id="rptag1lembar"
                            class="form-control @error('rptag1lembar') is-invalid @enderror"
                            placeholder="Masukkan RP TAG 1 Lembar"
                            value="{{ old('rptag1lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rptag1lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP BK 1 Lembar -->
                <div class="form-group">
                    <label for="rpbk1lembar">RP BK 1 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rpbk1lembar"
                            id="rpbk1lembar"
                            class="form-control @error('rpbk1lembar') is-invalid @enderror"
                            placeholder="Masukkan RP BK 1 Lembar"
                            value="{{ old('rpbk1lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rpbk1lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP TOT Lembar -->
                <div class="form-group">
                    <label for="rptotlembar">RP TOT Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rptotlembar"
                            id="rptotlembar"
                            class="form-control @error('rptotlembar') is-invalid @enderror"
                            placeholder="Masukkan RP TOT Lembar"
                            value="{{ old('rptotlembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rptotlembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto Rumah -->
                <div class="form-group">
                    <label for="fotorumah">Foto Rumah</label>
                    <input type="file" name="fotorumah" class="form-control" id="fotorumah" @error('fotorumah') is-invalid @enderror" placeholder="Masukkan Foto Rumah" value="{{ old('fotorumah') }}">
                    @error('fotorumah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Titik Koordinat -->
                <div class="form-group">
                    <label for="tikor">Titik Koordinat</label>
                    <input type="text" name="tikor" id="tikor" class="form-control @error('tikor') is-invalid @enderror" placeholder="Masukkan Titik Koordinat" value="{{ old('tikor') }}">
                    @error('tikor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

              </div>
              <div class="card-footer text-right">
                <button type="button" class="btn btn-success saveButton">Simpan</button>
                <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.mutasi') }}'">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
