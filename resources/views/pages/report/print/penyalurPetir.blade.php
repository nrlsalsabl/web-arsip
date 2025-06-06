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
                <th>Kode</th>
                <th>Jenis Penyalur</th>
                <th>Status</th>
                <th>Radius Protect</th>
                <th>Panjang Bangunan</th>
                <th>Lebar Bangunan</th>
                <th>Tinggi Penyalur</th>
                <th>Alat Ukur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kode ?? '-' }}</td>
                    <td>{{ $item->jenis_penyalur_petir ?? '-' }}</td>
                    <td>{{ $item->status ?? '-' }}</td>
                    <td>{{ $item->radius_proteksi ?? '-' }}</td>
                    <td>{{ $item->panjang_bangunan ?? '-' }}</td>
                    <td>{{ $item->lebar_bangunan ?? '-' }}</td>
                    <td>{{ $item->tinggi_penyalur ?? '-' }}</td>
                    <td>{{ $item->alat_ukur ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-signature :manajer="$manajer"/>
</body>
</html>
