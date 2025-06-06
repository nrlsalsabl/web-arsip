<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Bejana Tekan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
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
                <td>Jenis Pesawat/alat/mesin</td>
                <td>: {{ $bejanaTekan->jenis_pesawat ?? 'ABC' }}</td>
            </tr>
            <tr>
                <td>Nama Pabrik Pembuatan</td>
                <td>: {{ $bejanaTekan->tempat_pembuatan ?? 'PT ABC' }}</td>
            </tr>
            <tr>
                <td>Tempat Pembuatan</td>
                <td>: {{ $bejanaTekan->tempat_pembuatan ?? 'China' }}</td>
            </tr>
            <tr>
                <td>Tahun Pembuatan</td>
                <td>: {{ $bejanaTekan->tanggal_input ?? '2010' }}</td>
            </tr>
            <tr>
                <td>No. Seri</td>
                <td>: {{ $bejanaTekan->no_seri ?? '-' }}</td>
            </tr>
            <tr>
                <td>Bentuk Bejana Tekan</td>
                <td>: {{ $bejanaTekan->bentuk_bejana     ?? 'Mendatar' }}</td>
            </tr>
            <tr>
                <td>Tekanan Kerja</td>
                <td>: {{ $bejanaTekan->tekanan_kerja ?? '50' }}</td>
            </tr>
            <tr>
                <td>Volume</td>
                <td>: {{ $bejanaTekan->volume ?? '60' }}</td>
            </tr>
            <tr>
                <td>Bejana Diisi Bahan</td>
                <td>: {{ $bejanaTekan->bahan_diisi ?? 'Solar' }}</td>
            </tr>
            <tr>
                <td>No. Ijin Pemakaian</td>
                <td>: {{ $bejanaTekan->no_izin_pemakaian ?? '123/E.5.2/NT-11/1002' }}</td>
            </tr>
            <tr>
                <td>Tanggal Berlaku s/d</td>
                <td>: {{ $bejanaTekan->tanggal_berlaku ?? '05/07/2023' }}</td>
            </tr>
        </table>

        <p>Demikian Surat ini dibuat dengan sebenar-benar nya untuk dapat digunakan dengan semestinya.</p>

        <div class="text-end">
            Jakarta, {{ \Carbon\Carbon::parse($bejanaTekan->tanggal_input)->translatedFormat('d F Y') ?? '05 February 2022' }}
        </div>

    </div>
    <x-signature :manajer="$manajer"/>
</body>
</html>
