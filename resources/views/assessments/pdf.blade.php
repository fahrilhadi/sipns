<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian - {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .badge {
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .bg-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }
        .card-body {
            padding: 0;
        }
        .nilaiakhir {
            text-align: center;
            margin: 0;
        }
        .keterangan {
            text-align: center;
            margin: 0;
        }
        .card-title {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .underlined-per {
            display: inline-block;
            border-bottom: 1px solid #000;
            margin: 0 5px;
        }
        .biodata {
            margin-bottom: 20px;
        }
        .biodata-item {
            margin-bottom: 5px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .qr-code img {
            display: inline-block;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 8px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>HASIL SUPERVISI PROSES PEMBELAJARAN KURIKULUM MERDEKA MENGAJAR</h2>
        </div>
        <div class="biodata">
            <div class="biodata-item"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Sekolah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> SDN 55 Air Pacah</div>
            <div class="biodata-item"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Guru &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $user->name }}</div>
            <div class="biodata-item"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $jabatan }} </div>
            <div class="biodata-item"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hari/Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $tanggal }}</div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Uraian</th>
                                    <th>Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assessments as $assessment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @foreach ($assessment->teacherSupervisionInstrument->supervisionInstrument->criterias as $criteria)
                                                <span>{{ $criteria->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $assessment->teacherSupervisionInstrument->supervisionInstrument->name }}</td>
                                        <td>{{ $assessment->score }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-secondary">
                                <tr>
                                    <td colspan="3"><strong>Total Skor</strong></td>
                                    <td><strong>{{ $totalScore }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Kualifikasi</strong></td>
                                    <td><strong>{{ $kualifikasi }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <div class="nilaiakhir">
                    <div class="underlined-per">Nilai Akhir = Skor Perolehan x 100%</div>
                    <div>Skor Maksimal</div>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h6 class="card-title">Nilai Akhir = {{ $nilaiakhir }}%</h6>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <div class="keterangan">
                    <strong>Keterangan:</strong> <br>
                    Skor Maksimal = 120 <br>
                    86% - 100% = Baik Sekali <br>
                    70% - 85% = Baik <br>
                    55% - 69% = Cukup <br>
                    Dibawah 55% = Kurang
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <div class="footer">
                    <p>Air Pacah, {{ $tanggalSekarang }}</p>
                    <div class="qr-code">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ route('admin.assessments.qr-scan-details', ['user_id' => $user->id]) }}" alt="QR Code">
                    </div>
                    <p>( {{ $namaKepalaSekolah }} )</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>