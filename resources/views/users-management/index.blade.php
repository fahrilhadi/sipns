@extends('admin.master')

@section('admin-title')
    Manajemen Pengguna | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Manajemen Pengguna</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('admin.users-management.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
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
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Nama Pengguna</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($user->phone)
                                            {{ $user->phone }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($user->username)
                                            {{ $user->username }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="badge badge-light">{{ $user->role }}</div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('admin.users-management.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('admin.users-management.edit', $user->id) }}" class="btn btn-sm btn-warning btn-icon mt-1 mb-1"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.users-management.change-password', $user->id) }}" class="btn btn-sm btn-success btn-icon mt-1 mb-1"><i class="fas fa-key"></i></a>
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
                            text: "Hapus data pengguna?",
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