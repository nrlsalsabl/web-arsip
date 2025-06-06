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
                <td>Jenis Arus</td>
                <td>: {{ $instalasiListrik->jenis_arus ?? '' }}</td>
            </tr>
            <tr>
                <td>Jumlah Daya</td>
                <td>: {{ $instalasiListrik->jumlah_daya ?? '-' }}</td>
            </tr>
            <tr>
                <td>Sumber Tenaga Listrik</td>
                <td>: {{ $instalasiListrik->sumber_tenaga_listrik ?? '-' }}</td>
            </tr>
            <tr>
                <td>No Pengesahan</td>
                <td>: {{ $instalasiListrik->no_pengasahaan ?? '-' }}</td>
            </tr>
            <tr>
                <td>Tanggal Berlaku s/d</td>
                <td>: {{ $instalasiListrik->tanggal_berlaku ?? '-' }}</td>
            </tr>
        </table>

        <p>Demikian Surat ini dibuat dengan sebenar-benar nya untuk dapat digunakan dengan semestinya.</p>

        <div class="text-end">
            Jakarta, {{ \Carbon\Carbon::parse($instalasiListrik->tanggal_input)->translatedFormat('d F Y') ?? '05 February 2022' }}
        </div>

        <x-signature :manajer="$manajer"/>


        
    </div>
</body>
</html>
