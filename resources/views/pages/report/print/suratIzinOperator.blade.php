<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Penyalur Listrik</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            padding: 10px;
        }
        .text-center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        table {
            width: 100%;
            margin-top: 10px;
        }
        td {
            vertical-align: top;
            padding: 2px 4px;
        }
        .qr {
            text-align: center;
            margin-top: 30px;
        }
        .signature {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
       <x-kop-surat/>
       {{-- table  --}}
       <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>No Sertifikat</th>
                <th>Jenis Sertifikat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->user->nik ?? '-' }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->user->jabatan ?? '-' }}</td>
                    <td>{{ $item->user->departemen ?? '-' }}</td>
                    <td>{{ $item->no_sertifikat ?? '-' }}</td>
                    <td>{{ $item->jenis_sertifikat ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-signature :manajer="$manajer"/>
</body>
</html>
