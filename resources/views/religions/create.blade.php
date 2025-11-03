@extends('admin.master')

@section('admin-title')
    Tambah Data Kriteria | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Kriteria</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Data Kriteria</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('admin.criteria.store') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <a href="{{ route('admin.criteria.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Kode</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}">
                            <!-- error message untuk code -->
                            @error('code')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Kriteria</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            <!-- error message untuk name -->
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Bobot</label>
                            <input type="number" id="weight" name="weight" min="0" max="100" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                            <!-- error message untuk weight -->
                            @error('weight')
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