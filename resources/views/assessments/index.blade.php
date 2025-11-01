@extends('admin.master')

@push('admin-addon-style')
    <style>
        .card-c {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 300px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        .card-content {
            text-align: center;
            font-size: 15px;
        }
        .underlined-per {
            display: inline-block;
            border-bottom: 1px solid #000;
            margin: 0 5px;
        }
    </style>
@endpush

@section('admin-title')
    Penilaian | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Penilaian</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Penilaian</div>
            </div>
          </div>

          <div class="card-c">
              <div class="card-content">
                  <div class="underlined-per">Nilai Akhir = Skor Perolehan x 100%</div> <br>
                  Skor Maksimal
              </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama Guru</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach ($assessments as $assessment)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $assessment->user->name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('admin.assessments.show', $assessment->user_id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('admin.assessments.print', $assessment->user_id) }}" target="_blank" class="btn btn-sm btn-warning mt-1 mb-1"><i class="fas fa-print"></i></a>
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