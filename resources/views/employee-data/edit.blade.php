@extends('master')

@push('addon-style')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endpush

@section('title')
    Ubah Data Pegawai | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Data Pegawai</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Ubah Data Pegawai</div>
            </div>
          </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('user.employee-list.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <a href="{{ route('user.employee-list.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>NIP</label>
                            <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip', $pegawai->nip) }}">
                            <!-- error message untuk nip -->
                            @error('nip')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $pegawai->nama) }}">
                            <!-- error message untuk nama -->
                            @error('nama')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $pegawai->tempat_lahir) }}">
                            <!-- error message untuk tempat lahir -->
                            @error('tempat_lahir')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $pegawai->alamat) }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Tgl Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $pegawai->tgl_lahir->format('Y-m-d')) }}">
                            <!-- error message untuk tanggal lahir -->
                            @error('tgl_lahir')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_L" value="L" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'L' ? 'checked' : '' }}>>
                              <label class="form-check-label" for="jenis_kelamin_L">
                                Laki-Laki
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_P" value="P" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'P' ? 'checked' : '' }}>>
                              <label class="form-check-label" for="jenis_kelamin_P">
                                Perempuan
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                              <label for="golongan_id">Golongan</label>
                              <select name="golongan_id" id="golongan_id" class="form-control select2 @error('golongan_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Golongan --</option>
                                  @foreach ($golongans as $golongan)
                                      <option value="{{ $golongan->id }}" {{ old('golongan_id', $pegawai->golongan_id ?? '') == $golongan->id ? 'selected' : '' }}>
                                          {{ $golongan->nama_golongan }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk golongan -->
                              @error('golongan_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label for="eselon_id">Eselon</label>
                              <select name="eselon_id" id="eselon_id" class="form-control select2 @error('eselon_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Eselon --</option>
                                  @foreach ($eselons as $eselon)
                                      <option value="{{ $eselon->id }}" {{ old('eselon_id', $pegawai->eselon_id ?? '') == $eselon->id ? 'selected' : '' }}>
                                          {{ $eselon->nama_eselon }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk eselon -->
                              @error('eselon_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                              <label for="jabatan_id">Jabatan</label>
                              <select name="jabatan_id" id="jabatan_id" class="form-control select2 @error('jabatan_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Jabatan --</option>
                                  @foreach ($jabatans as $jabatan)
                                      <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $pegawai->jabatan_id ?? '') == $jabatan->id ? 'selected' : '' }}>
                                          {{ $jabatan->nama_jabatan }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk jabatan -->
                              @error('jabatan_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label for="tempat_tugas_id">Tempat Tugas</label>
                              <select name="tempat_tugas_id" id="tempat_tugas_id" class="form-control select2 @error('tempat_tugas_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Tempat Tugas --</option>
                                  @foreach ($tempatTugas as $tempat_tugas)
                                      <option value="{{ $tempat_tugas->id }}" {{ old('tempat_tugas_id', $pegawai->tempat_tugas_id ?? '') == $tempat_tugas->id ? 'selected' : '' }}>
                                          {{ $tempat_tugas->nama_tempat }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk tempat tugas -->
                              @error('tempat_tugas_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                              <label for="agama_id">Agama</label>
                              <select name="agama_id" id="agama_id" class="form-control select2 @error('agama_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Agama --</option>
                                  @foreach ($agamas as $agama)
                                      <option value="{{ $agama->id }}" {{ old('agama_id', $pegawai->agama_id ?? '') == $agama->id ? 'selected' : '' }}>
                                          {{ $agama->nama_agama }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk agama -->
                              @error('agama_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label for="unit_kerja_id">Unit Kerja</label>
                              <select name="unit_kerja_id" id="unit_kerja_id" class="form-control select2 @error('unit_kerja_id') is-invalid @enderror">
                                  <option value="" disabled selected>-- Pilih Unit Kerja --</option>
                                  @foreach ($unitKerjas as $unitKerja)
                                      <option value="{{ $unitKerja->id }}" {{ old('unit_kerja_id', $pegawai->unit_kerja_id ?? '') == $unitKerja->id ? 'selected' : '' }}>
                                          {{ $unitKerja->nama_unit }}
                                      </option>
                                  @endforeach
                              </select>
                              <!-- error message untuk unit kerja -->
                              @error('unit_kerja_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>No. HP</label>
                            <input type="number" class="form-control" name="no_hp" value="{{ old('no_hp', $pegawai->no_hp) }}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>NPWP</label>
                            <input type="text" class="form-control" name="npwp" value="{{ old('npwp', $pegawai->npwp) }}">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group align-items-center col-md-6 col-12">
                                <label class="form-control-label">Foto</label>
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="image">
                                    <label class="custom-file-label">Pilih File</label>
                                </div>
                            </div>
                            <div class="profile-widget col-md-6 col-12">
                                <div class="profile-widget-header">                    
                                    <img alt="image" id="showImage" src="{{ !empty($pegawai->foto) ? asset('/storage/public/pegawai/foto/' . $pegawai->foto) : asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
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