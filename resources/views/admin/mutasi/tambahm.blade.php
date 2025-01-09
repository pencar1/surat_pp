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
            <form action="{{ route('admin.mutasi.store') }}" method="POST" class="needs-validation">
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

                <!-- Tarif -->
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <select name="tarif" id="tarif" class="form-control @error('tarif') is-invalid @enderror">
                        <option value="" disabled {{ old('tarif') ? '' : 'selected' }}>Pilih Tarif</option>
                        <option value="r1" {{ old('tarif') == 'r1' ? 'selected' : '' }}>R1</option>
                        <option value="r1m" {{ old('tarif') == 'r1m' ? 'selected' : '' }}>R1M</option>
                        <option value="r1t" {{ old('tarif') == 'r1t' ? 'selected' : '' }}>R1T</option>
                        <option value="r1mt" {{ old('tarif') == 'r1mt' ? 'selected' : '' }}>R1MT</option>
                        <option value="r2" {{ old('tarif') == 'r2' ? 'selected' : '' }}>R2</option>
                        <option value="r2t" {{ old('tarif') == 'r2t' ? 'selected' : '' }}>R1T</option>
                        <option value="r3" {{ old('tarif') == 'r3' ? 'selected' : '' }}>R3</option>
                        <option value="r3t" {{ old('tarif') == 'r3t' ? 'selected' : '' }}>R3T</option>
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
                        <option value="1300" {{ old('daya') == '1300' ? 'selected' : '' }}>1300</option>
                        <option value="2200" {{ old('daya') == '2200' ? 'selected' : '' }}>2200</option>
                        <option value="3500" {{ old('daya') == '3500' ? 'selected' : '' }}>3500</option>
                        <option value="4400" {{ old('daya') == '4400' ? 'selected' : '' }}>4400</option>
                        <option value="5500" {{ old('daya') == '5500' ? 'selected' : '' }}>5500</option>
                        <option value="6600" {{ old('daya') == '6600' ? 'selected' : '' }}>6600</option>
                        <option value="7700" {{ old('daya') == '7700' ? 'selected' : '' }}>7700</option>
                        <option value="10600" {{ old('daya') == '10600' ? 'selected' : '' }}>10600</option>
                        <option value="11000" {{ old('daya') == '11000' ? 'selected' : '' }}>11000</option>
                        <option value="13200" {{ old('daya') == '13200' ? 'selected' : '' }}>13200</option>
                        <option value="13900" {{ old('daya') == '13900' ? 'selected' : '' }}>13900</option>
                        <option value="16500" {{ old('daya') == '16500' ? 'selected' : '' }}>16500</option>
                        <option value="17600" {{ old('daya') == '17600' ? 'selected' : '' }}>17600</option>
                        <option value="22000" {{ old('daya') == '22000' ? 'selected' : '' }}>22000</option>
                        <option value="23000" {{ old('daya') == '23000' ? 'selected' : '' }}>23000</option>
                        <option value="33000" {{ old('daya') == '33000' ? 'selected' : '' }}>33000</option>
                        <option value="41500" {{ old('daya') == '41500' ? 'selected' : '' }}>41500</option>
                        <option value="53000" {{ old('daya') == '53000' ? 'selected' : '' }}>53000</option>
                        <option value="66000" {{ old('daya') == '66000' ? 'selected' : '' }}>66000</option>
                        <option value="82500" {{ old('daya') == '82500' ? 'selected' : '' }}>82500</option>
                    </select>
                    @error('daya')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bulan Awal -->
                <div class="form-group">
                    <label for="bulanawal">Bulan Awal</label>
                    <select name="bulanawal" id="bulanawal" class="form-control">
                        <option value="" disabled selected>Pilih Bulan Awal</option>
                        @php
                            $currentYear = date('Y'); // Tahun saat ini
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
                            foreach ($months as $key => $month) {
                                echo "<option value=\"$key-$currentYear\">$month $currentYear</option>";
                            }
                        @endphp
                    </select>
                </div>

                <!-- Bulan Akhir -->
                <div class="form-group">
                    <label for="bulanakhir">Bulan Akhir</label>
                    <select name="bulanakhir" id="bulanakhir" class="form-control">
                        <option value="" disabled selected>Pilih Bulan Akhir</option>
                        @php
                            foreach ($months as $key => $month) {
                                echo "<option value=\"$key-$currentYear\">$month $currentYear</option>";
                            }
                        @endphp
                    </select>
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
                    <label for="rptag3lembar">RP TAG 3 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rptag3lembar"
                            id="rptag3lembar"
                            class="form-control @error('rptag3lembar') is-invalid @enderror"
                            placeholder="Masukkan RP TAG 3 Lembar"
                            value="{{ old('rptag3lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rptag3lembar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- RP BK 3 Lembar -->
                <div class="form-group">
                    <label for="rpbk3lembar">RP BK 3 Lembar</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input
                            type="text"
                            name="rpbk3lembar"
                            id="rpbk3lembar"
                            class="form-control @error('rpbk3lembar') is-invalid @enderror"
                            placeholder="Masukkan RP BK 3 Lembar"
                            value="{{ old('rpbk3lembar') }}"
                            oninput="formatNumber(this)"
                        >
                    </div>
                    @error('rpbk3lembar')
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

                <!-- Kode Ujung PK -->
                <div class="form-group">
                    <label for="kodeujungpk">Kode Ujung PK</label>
                    <input type="text" name="kodeujungpk" id="kodeujungpk" class="form-control @error('kodeujungpk') is-invalid @enderror" placeholder="Masukkan Kode Ujung PK" value="{{ old('kodeujungpk') }}">
                    @error('kodeujungpk')
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
                        <option value="6A" {{ old('amper') == '6A' ? 'selected' : '' }}>6A</option>
                        <option value="10A" {{ old('amper') == '10A' ? 'selected' : '' }}>10A</option>
                        <option value="16A" {{ old('amper') == '16A' ? 'selected' : '' }}>16A</option>
                        <option value="20A" {{ old('amper') == '20A' ? 'selected' : '' }}>20A</option>
                        <option value="25A" {{ old('amper') == '25A' ? 'selected' : '' }}>25A</option>
                        <option value="32A" {{ old('amper') == '32A' ? 'selected' : '' }}>32A</option>
                        <option value="40A" {{ old('amper') == '40A' ? 'selected' : '' }}>40A</option>
                        <option value="50A" {{ old('amper') == '50A' ? 'selected' : '' }}>50A</option>
                        <option value="63A" {{ old('amper') == '63A' ? 'selected' : '' }}>63A</option>
                        <option value="80A" {{ old('amper') == '80A' ? 'selected' : '' }}>80A</option>
                        <option value="100A" {{ old('amper') == '100A' ? 'selected' : '' }}>100A</option>
                        <option value="125A" {{ old('amper') == '125A' ? 'selected' : '' }}>125A</option>
                    </select>
                    @error('daya')
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
