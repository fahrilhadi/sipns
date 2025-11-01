@extends('admin.master')

@section('admin-title')
    Data Guru | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Data Guru</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('admin.teachers-data.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Golongan</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $teacher->name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($teacher->nip)
                                            {{ $teacher->nip }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($teacher->golongan)
                                            {{ $teacher->golongan }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($teacher->jabatan)
                                            {{ $teacher->jabatan }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('admin.teachers-data.destroy', $teacher->id) }}" method="POST">
                                            <a href="{{ route('admin.teachers-data.edit', $teacher->id) }}" class="btn btn-sm btn-warning btn-icon mt-1 mb-1"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.teachers-data.change-password', $teacher->id) }}" class="btn btn-sm btn-success btn-icon mt-1 mb-1"><i class="fas fa-key"></i></a>
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

@push('admin-addon-script')
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
                            text: "Hapus data guru?",
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