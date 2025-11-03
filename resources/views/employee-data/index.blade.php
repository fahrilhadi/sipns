@extends('master')

@section('title')
    Daftar Pegawai | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Daftar Pegawai</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Pegawai</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-6">
                        <a href="{{ route('user.employee-list.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
                      </div>
                      <div class="col-6">
                        <a href="" class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Cetak Data</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tgl Lahir</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">Gol</th>
                            <th class="text-center">Eselon</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Tempat Tugas</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Unit Kerja</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">NPWP</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('/storage/public/pegawai/foto/' . $pegawai->foto) }}" alt="" width="50">
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->nip }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->nama }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->tempat_lahir }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->alamat }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->tgl_lahir->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->jenis_kelamin }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->golongan->nama_golongan }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->eselon->nama_eselon }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->jabatan->nama_jabatan }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->tempatTugas->nama_tempat }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->agama->nama_agama }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->unitKerja->nama_unit }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->no_hp }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $pegawai->npwp }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('user.employee-list.destroy', $pegawai->id) }}" method="POST">
                                            <a href="{{ route('user.employee-list.edit', $pegawai->id) }}" class="btn btn-sm btn-warning btn-icon mt-1 mb-1"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" class="btn btn-sm btn-danger btn-icon"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection

@push('addon-script')
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>

    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var form = $(this).closest('form');

        
                        Swal.fire({
                            title: 'Apakah anda yakin?',
                            text: "Hapus data pegawai?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            form.submit();
                            }
                        }) 


            });

        });
    </script>
@endpush