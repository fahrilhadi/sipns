@extends('admin.master')

@section('admin-title')
    Tambah Data Instrumen Supervisi | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Instrumen Supervisi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Data Instrumen Supervisi</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('admin.supervision-instruments.store') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <a href="{{ route('admin.supervision-instruments.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label for="criteria">Nama Kriteria</label>
                            <select class="form-control select2 @error('criteria') is-invalid @enderror" name="criteria">
                                <option value="" disabled selected>--Pilih Kriteria--</option>
                                @foreach($criterias as $criteria)
                                    <option value="{{ $criteria->id }}">{{ $criteria->code }} - {{ $criteria->name }}</option>
                                @endforeach
                            </select>
                            <!-- error message untuk criteria -->
                            @error('criteria')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Soal</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            <!-- error message untuk name -->
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
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