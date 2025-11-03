@extends('master')

@section('title')
    Agama | Sistem Informasi Kepegawaian
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Agama</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Agama</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('user.religions.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-religions">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama Agama</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($agamas as $agama)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $agama->nama_agama }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('user.religions.destroy', $agama->id) }}" method="POST">
                                            <a href="{{ route('user.religions.edit', $agama->id) }}" class="btn btn-sm btn-warning btn-icon mt-1 mb-1"><i class="fas fa-edit"></i></a>
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
                            text: "Hapus data agama?",
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