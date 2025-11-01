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
        .card-d {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 220px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        .card-content {
            text-align: center;
            font-size: 15px;
        }
        .card-keterangan {
            text-align: left;
            font-size: 15px;
        }
        .underlined-per {
            display: inline-block;
            border-bottom: 1px solid #000;
            margin: 0 5px;
        }
        .bg-secondary {
            background-color: #6c757d !important;
            color: #fff;
        }
    </style>
@endpush

@section('admin-title')
    Hasil Penilaian | Sistem Supervisi Akademik
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hasil Penilaian</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Hasil Penilaian</div>
                </div>
            </div>

            <div class="mb-4">
                <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Hasil Supervisi: {{ $user->name }}</span>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.assessments.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-chevron-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kriteria</th>
                                        <th class="text-center">Uraian</th>
                                        <th class="text-center">Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assessments as $assessment)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                @foreach ($assessment->teacherSupervisionInstrument->supervisionInstrument->criterias as $criteria)
                                                    {{ $criteria->name }}
                                                    @if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ $assessment->teacherSupervisionInstrument->supervisionInstrument->name }}</td>
                                            <td class="text-center">{{ $assessment->score }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Total Skor</strong></td>
                                        <td class="text-center"><strong>{{ $totalScore }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Kualifikasi</strong></td>
                                        <td class="text-center"><strong>{{ $kualifikasi }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-c">
                        <div class="card-content">
                            <div class="underlined-per">Nilai Akhir = Skor Perolehan x 100%</div> <br>
                            Skor Maksimal
                        </div>
                    </div>
                    <!-- Card kecil di bawah DataTable -->
                    <div class="text-center mt-1">
                        <div class="card bg-light text-black mx-auto" style="max-width: 200px;">
                            <div class="card-body">
                                <h6 class="card-title my-auto">Nilai Akhir = {{ $nilaiakhir }}%</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-d">
                        <div class="card-keterangan">
                            <strong>Keterangan:</strong> <br>
                            Skor Maksimal = 120 <br>
                            86% - 100% = Baik Sekali <br>
                            70% - 85% = Baik <br>
                            55% - 69% = Cukup <br>
                            Dibawah 55% = Kurang
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection