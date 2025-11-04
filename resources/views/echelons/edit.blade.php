@extends('master')

@section('title')
    Ubah Data Golongan | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Data Golongan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Ubah Data Golongan</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('user.ranks.update', $golongan->id) }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <a href="{{ route('user.ranks.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Nama Golongan</label>
                            <input type="text" class="form-control @error('nama_golongan') is-invalid @enderror" name="nama_golongan" value="{{ old('nama_golongan', $golongan->nama_golongan) }}">
                            <!-- error message untuk nama golongan -->
                            @error('nama_golongan')
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