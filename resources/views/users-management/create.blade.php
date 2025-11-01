@extends('admin.master')

@section('admin-title')
    Tambah Data Pengguna | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Data Pengguna</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('admin.users-management.store') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <a href="{{ route('admin.users-management.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            <!-- error message untuk name -->
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                            <!-- error message untuk username -->
                            @error('username')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            <!-- error message untuk email -->
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>No. HP</label>
                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control select2 @error('role') is-invalid @enderror">
                                    <option value="" disabled selected>--Pilih Role--</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kepsek" {{ old('role') == 'kepsek' ? 'selected' : '' }}>Kepsek</option>
                                </select>
                                <!-- error message untuk role -->
                                @error('role')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                              <!-- error message untuk password -->
                              @error('password')
                                  <span class="text-danger">
                                      {{ $message }}
                                  </span>
                              @enderror
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
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