@extends('admin.master')

@push('admin-addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endpush

@section('admin-title')
    Ubah Password Guru | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Password Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Ubah Password Guru</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('admin.teachers-data.change-password.update', $teacher->id) }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <a href="{{ route('admin.teachers-data.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Password Lama</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="id_oldpassword">
                            <i class="far fa-eye password-toggle" id="toggleOldPassword" style="cursor: pointer; position: absolute; right: 30px; top: 40px;"></i>
                            <!-- error message untuk old password -->
                            @error('old_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Password Baru</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="id_newpassword">
                            <i class="far fa-eye password-toggle" id="toggleNewPassword" style="cursor: pointer; position: absolute; right: 30px; top: 40px;"></i>
                            <!-- error message untuk new password -->
                            @error('new_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="new_password_confirmation" id="id_confirmpassword">
                            <i class="far fa-eye password-toggle" id="toggleConfirmPassword" style="cursor: pointer; position: absolute; right: 30px; top: 40px;"></i>
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

@push('admin-addon-script')
    <script>
        const toggleOldPassword =
              document.querySelector('#toggleOldPassword');
 
        const oldpassword = 
              document.querySelector('#id_oldpassword');
 
        toggleOldPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = oldpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            oldpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleOldPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleOldPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleOldPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>

    <script>
        const toggleNewPassword =
              document.querySelector('#toggleNewPassword');
 
        const newpassword = 
              document.querySelector('#id_newpassword');
 
        toggleNewPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = newpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            newpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleNewPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleNewPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleNewPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>

    <script>
        const toggleConfirmPassword =
              document.querySelector('#toggleConfirmPassword');
 
        const confirmpassword = 
              document.querySelector('#id_confirmpassword');
 
        toggleConfirmPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = confirmpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            confirmpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleConfirmPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleConfirmPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleConfirmPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>
@endpush