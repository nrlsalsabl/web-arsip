<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Instalasi Hydrant</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
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
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Pillar Hydrant</th>
                <th>Selang</th>
                <th>Validity Period</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kode ?? '-' }}</td>
                    <td>{{ $item->kapasitas ?? '-' }}</td>
                    <td class="text-center">{{ ucfirst($item->status ?? '-') }}</td>
                    <td>{{ $item->pilar_hydrant ?? '-' }}</td>
                    <td>{{ $item->selang ?? '-' }}</td>
                    <td class="text-center">
                        @if (!empty($item->tanggal_berlaku_sd))
                            {{ \Carbon\Carbon::parse($item->tanggal_berlaku_sd)->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-signature :manajer="$manajer"/>
</body>
</html>
