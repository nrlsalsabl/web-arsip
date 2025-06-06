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
                <td>Jenis Penyalur</td>
                <td>: {{ $penyalurPetir->jenis_penyalur_petir ?? '' }}</td>
            </tr>
            <tr>
                <td>Radius Proteksi</td>
                <td>: {{ $penyalurPetir->radius_proteksi ?? '-' }}</td>
            </tr>
            <tr>
                <td>Panjang Bangunan</td>
                <td>: {{ $penyalurPetir->panjang_bangunan ?? '-' }}</td>
            </tr>
            <tr>
                <td>Lebar Bangunan</td>
                <td>: {{ $penyalurPetir->lebar_bangunan ?? '-' }}</td>
            </tr>
            <tr>
                <td>Tinggi Penyalur</td>
                <td>: {{ $penyalurPetir->tinggi_penyalur ?? '-' }}</td>
            </tr>
            <tr>
                <td>Bentuk Elektroda</td>
                <td>: {{ $penyalurPetir->bentuk_elektroda ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alat Ukur</td>
                <td>: {{ $penyalurPetir->alat_ukur ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pelaksana Pemasangan</td>
                <td>: {{ $penyalurPetir->pelaksana_pemasangan ?? '-' }}</td>
            </tr>
            <tr>
                <td>Tanggal Berlaku</td>
                <td>: {{ $penyalurPetir->tanggal_berlaku_sampai ?? '-' }}</td>
            </tr>
        </table>

        <p>Demikian Surat ini dibuat dengan sebenar-benar nya untuk dapat digunakan dengan semestinya.</p>

        <div class="text-end">
            Jakarta, {{ \Carbon\Carbon::parse($penyalurPetir->tanggal_input)->translatedFormat('d F Y') ?? '05 February 2022' }}
        </div>

        <x-signature :manajer="$manajer"/>

    </div>
</body>
</html>
