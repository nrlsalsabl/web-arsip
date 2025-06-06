<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Instalasi Listrik</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
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
                <th>Jenis Arus</th>
                <th>Status</th>
                <th>Jumlah Daya</th>
                <th>Sumber Tenaga</th>
                <th>No. Pengesahan</th>
                <th>Tanggal Berlaku</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kode ?? '-' }}</td>
                    <td>{{ $item->jenis_arus ?? '-' }}</td>
                    <td class="text-center">{{ ucfirst($item->status ?? '-') }}</td>
                    <td>{{ $item->jumlah_daya ?? '-' }}</td>
                    <td>{{ $item->sumber_tenaga_listrik ?? '-' }}</td>
                    <td>{{ $item->no_pengasahaan ?? '-' }}</td>
                    <td class="text-center">
                        @if (!empty($item->tanggal_berlaku))
                            {{ \Carbon\Carbon::parse($item->tanggal_berlaku_sd)->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="text-center">
                        @if (!empty($item->tanggal_input))
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
