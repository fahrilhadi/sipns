@extends('master')

@section('title')
    Tambah Data Unit Kerja | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Unit Kerja</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Data Unit Kerja</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('user.work-unit.store') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <a href="{{ route('user.work-unit.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">  
                          <div class="form-group col-12">
                            <label>Nama Unit Kerja</label>
                            <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" name="nama_unit" value="{{ old('nama_unit') }}">
                            <!-- error message untuk nama unit kerja -->
                            @error('nama_unit')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection