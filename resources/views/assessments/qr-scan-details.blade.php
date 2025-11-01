<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hasil Penilaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .card-body {
            padding: 0;
        }
        .biodata {
            margin-top: 50px;
            margin-bottom: 50px;
            text-align: center;
        }
        .biodata-item {
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
        .underlined-per {
            display: inline-block;
            border-bottom: 1px solid #000;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="underlined-per">HASIL SUPERVISI PROSES PEMBELAJARAN KURIKULUM MERDEKA MENGAJAR</h2>
        </div>
        <div class="card-body">
            <div class="biodata">
                <div class="biodata-item"><strong>Nama Sekolah :</strong> SDN 55 Air Pacah</div>
                <div class="biodata-item"><strong>Nama Guru :</strong> {{ $user->name }}</div>
                <div class="biodata-item"><strong>Jabatan :</strong> {{ $jabatan }}</div>
                <div class="biodata-item"><strong>Hari/Tanggal :</strong> {{ $tanggal }}</div>
                <div class="biodata-item"><strong>Ditandatangani oleh :</strong> {{ $namaKepalaSekolah }}</div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} SDN 55 Air Pacah</p>
        </div>
    </div>
</body>
</html>