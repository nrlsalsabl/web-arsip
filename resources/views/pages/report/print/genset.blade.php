<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Genset</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
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
                <th>Kode</th>
                <th>Jenis Alat</th>
                <th>Status</th>
                <th>Nama Pabrik</th>
                <th>Tempat Pembuatan</th>
                <th>No Pabrik</th>
                <th>Daya</th>
                <th>No Pengasahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kode ?? '-' }}</td>
                    <td>{{ $item->jenis_alat ?? '-' }}</td>
                    <td class="text-center">{{ ucfirst($item->status ?? '-') }}</td>
                    <td>{{ $item->nama_pabrik_pembuatan ?? '-' }}</td>
                    <td>{{ $item->tempat_pembuatan ?? '-' }}</td>
                    <td>{{ $item->nomor_pabrik_pembuatan ?? '-' }}</td>
                    <td>{{ $item->daya ?? '-' }}</td>
                    <td>{{ $item->no_pengesahan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-signature :manajer="$manajer"/>
</body>
</html>
