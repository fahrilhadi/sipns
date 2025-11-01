@extends('admin.master')

@section('admin-title')
    Kriteria | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kriteria</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Kriteria</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('admin.criteria.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama Kriteria</th>
                            <th class="text-center">Bobot</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $criteria->code }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $criteria->name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $criteria->weight }}%
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('admin.criteria.destroy', $criteria->id) }}" method="POST">
                                            <a href="{{ route('admin.criteria.edit', $criteria->id) }}" class="btn btn-sm btn-warning btn-icon mt-1 mb-1"><i class="fas fa-edit"></i></a>
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
            <!-- Card kecil di bawah DataTable -->
            <div class="text-center mt-1">
                <div class="card bg-light text-black mx-auto" style="max-width: 200px;">
                    <div class="card-body">
                        <h6 class="card-title my-auto">Total Bobot = {{ $totalWeight }}%</h6>
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
                            text: "Hapus data kriteria?",
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