@extends('master')

@section('title')
    Ubah Data Tempat Tugas | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Data Tempat Tugas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Ubah Data Tempat Tugas</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('user.duty-station.update', $tempatTugas->id) }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <a href="{{ route('user.duty-station.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Nama Tempat Tugas</label>
                            <input type="text" class="form-control @error('nama_tempat') is-invalid @enderror" name="nama_tempat" value="{{ old('nama_tempat', $tempatTugas->nama_tempat) }}">
                            <!-- error message untuk nama tempat tugas -->
                            @error('nama_tempat')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection