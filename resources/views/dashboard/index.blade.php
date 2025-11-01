@extends('master')

@push('addon-style')
    <style>
        .welcome {
            margin-top: 200px;
            margin-bottom: 200px;
        }
    </style>
@endpush

@section('title')
    Dashboard | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pegawai</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalPegawais }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-tasks"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Jabatan</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalJabatans }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Tempat Tugas</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalTempatTugas }}
                  </div>
                </div>
              </div>
            </div>              
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="text-center welcome">SELAMAT DATANG DI SISTEM INFORMASI KEPEGAWAIAN</h5>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection