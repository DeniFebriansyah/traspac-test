<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cetak Pegawai</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <style>
        * {
            box-sizing: border-box;
        }

        @page {
            margin: 1cm;
        }


        .container {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .table-container {
            margin: 20px 0;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 3px;
            text-align: start;
            vertical-align: middle;
        }

        .table th {
            background-color: #003366;
            color: #fff;
            font-weight: bold;
        }

        h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        thead {
            display: table-row-group;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm 15mm;
            }

            .container {
                margin: 0;
                padding: 0;
            }

            .table-container {
                padding: 0;
            }

            .table {
                page-break-inside: auto;
                font-size: 10px;
                width: 100%;
            }
        }
    </style>
    @inject('carbon', 'Carbon\Carbon')
    <div class="container">
        <div class="text-center">
            <h3 class="text-dark">DAFTAR PEGAWAI</h3>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tempat Lahir</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tanggal Lahir</th>
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
                    @foreach ($pegawai as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ $data->alamat->alamat }}</td>
                            <td>{{ $carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->pegawai->golongan }}</td>
                            <td>{{ $data->pegawai->eselon }}</td>
                            <td>{{ $data->pegawai->jabatan }}</td>
                            <td>{{ $data->pegawai->tempat_tugas }}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->pegawai->unit_kerja }}</td>
                            <td>{{ $data->alamat->no_hp }}</td>
                            <td>{{ $data->pegawai->npwp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
