@extends('master')

@push('addon-style')
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
@endpush

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
                    <div class="row mr-2">
                      <div class="col-6">
                        <a href="{{ route('user.employee-list.create') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah Data</a>
                      </div>
                      <div class="col-6">
                        <button id="btnPrint" class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Cetak Data</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <form action="{{ route('user.employee-list.index') }}" method="GET">
                          <div class="input-group">
                            <select name="unit_kerja_id" class="form-control select2" onchange="this.form.submit()">
                              <option value="">-- Filter Unit Kerja --</option>
                              @foreach ($unitKerjas as $unit)
                                <option value="{{ $unit->id }}" {{ $unitKerjaId == $unit->id ? 'selected' : '' }}>
                                  {{ $unit->nama_unit }}
                                </option>
                              @endforeach
                            </select>
                            @if ($unitKerjaId)
                              <div class="input-group-append">
                                <a href="{{ route('user.employee-list.index') }}" class="btn btn-danger ml-4 pt-2">Reset</a>
                              </div>
                            @endif
                          </div>
                        </form>
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
                                        <img src="{{ asset('/storage/pegawai/foto/' . $pegawai->foto) }}" alt="" width="50">
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

    <!-- Modal Preview Print -->
    <div class="modal fade bd-example-modal-xl" id="previewPrintModal" tabindex="-1" role="dialog" aria-labelledby="previewPrintModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="previewPrintModalLabel">Preview Cetak Data Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="printArea">
              <h4 class="text-center mb-2">DAFTAR PEGAWAI</h4>
              <h5 class="text-center mb-4">Instansi X</h5>
              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
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
                    </tr>
                  </thead>
                  <tbody>
                    {!! $pegawais->map(function($pegawai, $i){
                      return "<tr>
                                <td>".($i+1)."</td>
                                <td>$pegawai->nip</td>
                                <td>$pegawai->nama</td>
                                <td>$pegawai->tempat_lahir</td>
                                <td>$pegawai->alamat</td>
                                <td>".$pegawai->tgl_lahir->format('d/m/Y')."</td>
                                <td>$pegawai->jenis_kelamin</td>
                                <td>".$pegawai->golongan->nama_golongan."</td>
                                <td>".$pegawai->eselon->nama_eselon."</td>
                                <td>".$pegawai->jabatan->nama_jabatan."</td>
                                <td>".$pegawai->tempatTugas->nama_tempat."</td>
                                <td>".$pegawai->agama->nama_agama."</td>
                                <td>".$pegawai->unitKerja->nama_unit."</td>
                                <td>$pegawai->no_hp</td>
                                <td>$pegawai->npwp</td>
                              </tr>";
                    })->implode('') !!}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="confirmPrint" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Sekarang</button>
          </div>
        </div>
      </div>
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
    
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <script>
      $(document).on('click', '#btnPrint', function() {
        printJS({
          printable: 'printArea',   // ID elemen yang ingin diprint
          type: 'html',
          style: `
            @page { size: A4 landscape; margin: 10mm; }

            h4, h5 {
              text-align: center !important;
              margin: 0;
              padding: 0;
            }

            h4 {
              font-size: 16pt;
              font-weight: bold;
              margin-bottom: 4px;
              color: #000000;
              text-transform: uppercase;
            }

            h5 {
              font-size: 15pt;
              font-weight: bold;
              margin-bottom: 15px;
              color: #000000;
            }

            table {
              border-collapse: collapse;
              width: 100%;
              font-size: 12px;
            }

            th, td {
              border: 1px solid #000;
              padding: 4px;
              text-align: center;
              vertical-align: middle;
            }

            thead th {
              background-color: #1f3864 !important;
              color: white !important;
              -webkit-print-color-adjust: exact !important;
              print-color-adjust: exact !important;
            }

            tbody tr:nth-child(even) {
              background-color: #f9f9f9 !important;
            }
          `
        });
      });
    </script>
@endpush