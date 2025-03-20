@extends('layout.layoutkaryawan')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
          <div class="col-lg-6 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-money-check-alt"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Mutasi N</h4>
                </div>
                <div class="card-body">
                  {{ $totalMutasi }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-address-card"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Rubah Tarif</h4>
                </div>
                <div class="card-body">
                {{ $totalRubahTarif }}
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>

@endsection
