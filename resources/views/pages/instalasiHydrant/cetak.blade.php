<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Bejana Tekan</title>
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

        <br>
        <div><span class="bold">Yang bertanda tangan di bawah ini :</span></div>

        <table>
            <tr>
                <td width="30%">Nama</td>
                <td>: {{ $manajer->name ?? 'May' }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: {{ $manajer->jabatan ?? 'Manager' }}</td>
            </tr>
        </table>

        <br>
        <div class="bold">Menerangkan Bahwa :</div>

        <table>
            <tr>
                <td>Kapasitas</td>
                <td>: {{ $instalasiHydrant->kapasitas ?? '' }}</td>
            </tr>
            <tr>
                <td>Pillar Hydrant</td>
                <td>: {{ $instalasiHydrant->pillar_hydrant ?? 'PT ABC' }}</td>
            </tr>
            <tr>
                <td>Kotak Hydrant</td>
                <td>: {{ $instalasiHydrant->kontak_hydrant ?? 'China' }}</td>
            </tr>
            <tr>
                <td>Selang</td>
                <td>: {{ $instalasiHydrant->selang ?? '2010' }}</td>
            </tr>
            <tr>
                <td>Hode Rell</td>
                <td>: {{ $instalasiHydrant->hose_reel ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pipa Pancar</td>
                <td>: {{ $instalasiHydrant->pipa_pancar     ?? 'Mendatar' }}</td>
            </tr>
            <tr>
                <td>Mesin Penggerak</td>
                <td>: {{ $instalasiHydrant->mesin_penggerak ?? '50' }}</td>
            </tr>
            <tr>
                <td>Pompa</td>
                <td>: {{ $instalasiHydrant->pompa ?? '60' }}</td>
            </tr>
            <tr>
                <td>Tekanan Kerja Max</td>
                <td>: {{ $instalasiHydrant->tekanan_kerja_max ?? 'Solar' }}</td>
            </tr>
            <tr>
                <td>No. Ijin Pemakaian</td>
                <td>: {{ $instalasiHydrant->no_izin_pemakaian ?? '123/E.5.2/NT-11/1002' }}</td>
            </tr>
            <tr>
                <td>Tanggal Berlaku s/d</td>
                <td>: {{ $instalasiHydrant->tanggal_berlaku ?? '05/07/2023' }}</td>
            </tr>
        </table>

        <p>Demikian Surat ini dibuat dengan sebenar-benar nya untuk dapat digunakan dengan semestinya.</p>

        <div class="text-end">
            Jakarta, {{ \Carbon\Carbon::parse($instalasiHydrant->tanggal_input)->translatedFormat('d F Y') ?? '05 February 2022' }}
        </div>

        <x-signature :manajer="$manajer"/>
        
    </div>
</body>
</html>
