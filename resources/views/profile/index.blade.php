@extends('master')

@push('addon-style')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endpush

@section('title')
    Profil | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profil</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Profil</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hai, {{ $Profile->name }}!</h2>
            <p class="section-lead">
              Ubah informasi tentang diri Anda di halaman ini.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('user.profile.update', $Profile->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Ubah Profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $Profile->name) }}">
                            <!-- error message untuk name -->
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $Profile->email) }}">
                            <!-- error message untuk email -->
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group align-items-center col-md-6 col-12">
                                <label class="form-control-label">Foto</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="image">
                                    <label class="custom-file-label">Pilih File</label>
                                </div>
                            </div>
                            <div class="profile-widget col-md-6 col-12">
                                <div class="profile-widget-header">                    
                                    <img alt="image" id="showImage" src="{{ !empty($Profile->photo) ? asset('/storage/public/profile/' . $Profile->photo) : asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                                </div>
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

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush