<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<h3>Bejana Tekan</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Jenis Pesawat</th>
            <th>Tempat Pembuatan</th>
            <th>No Seri</th>
            <th>Bentuk Bejana</th>
            <th>Tekanan Kerja</th>
            <th>Volume</th>
            <th>Bahan Diisi</th>
            <th>No Izin Pemakaian</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bejanaTekan as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->jenis_pesawat }}</td>
            <td>{{ $item->tempat_pembuatan }}</td>
            <td>{{ $item->no_seri }}</td>
            <td>{{ $item->bentuk_bejana }}</td>
            <td>{{ $item->tekanan_kerja }}</td>
            <td>{{ $item->volume }}</td>
            <td>{{ $item->bahan_diisi }}</td>
            <td>{{ $item->no_izin_pemakaian }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Instalasi Hydrant</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kapasitas</th>
            <th>Pilar Hydrant</th>
            <th>Kontak Hydrant</th>
            <th>Selang</th>
            <th>Hose Reel</th>
            <th>Pipa Pancar</th>
            <th>Mesin Penggerak</th>
            <th>Pompa</th>
            <th>Tekanan Kerja Max</th>
            <th>No Ijin Pemakaian</th>
            <th>Tanggal Berlaku s/d</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hydrant as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->kapasitas }}</td>
            <td>{{ $item->pilar_hydrant }}</td>
            <td>{{ $item->kontak_hydrant }}</td>
            <td>{{ $item->selang }}</td>
            <td>{{ $item->hose_reel }}</td>
            <td>{{ $item->pipa_pancar }}</td>
            <td>{{ $item->mesin_penggerak }}</td>
            <td>{{ $item->pompa }}</td>
            <td>{{ $item->tekanan_kerja_max }}</td>
            <td>{{ $item->no_ijin_pemakaian }}</td>
            <td>{{ $item->tanggal_berlaku_sd }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Instalasi Listrik</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Arus</th>
            <th>Jumlah Daya</th>
            <th>Sumber Tenaga Listrik</th>
            <th>No Pengasahaan</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listrik as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->jenis_arus }}</td>
            <td>{{ $item->jumlah_daya }}</td>
            <td>{{ $item->sumber_tenaga_listrik }}</td>
            <td>{{ $item->no_pengasahaan }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Genset</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Jenis Alat</th>
            <th>Nama Pabrik</th>
            <th>Tempat Pembuatan</th>
            <th>No Pabrik</th>
            <th>Daya</th>
            <th>No Pengesahan</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genset as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->jenis_alat }}</td>
            <td>{{ $item->nama_pabrik_pembuatan }}</td>
            <td>{{ $item->tempat_pembuatan }}</td>
            <td>{{ $item->nomor_pabrik_pembuatan }}</td>
            <td>{{ $item->daya }}</td>
            <td>{{ $item->no_pengesahan }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Ketel Uap</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Akte Izin No</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ketelUap as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->akte_izin_no }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Penyalur Petir</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Jenis</th>
            <th>Radius</th>
            <th>Panjang</th>
            <th>Lebar</th>
            <th>Tinggi</th>
            <th>Bentuk Elektroda</th>
            <th>Alat Ukur</th>
            <th>Pelaksana</th>
            <th>Tgl Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($petir as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->jenis_penyalur_petir }}</td>
            <td>{{ $item->radius_proteksi }}</td>
            <td>{{ $item->panjang_bangunan }}</td>
            <td>{{ $item->lebar_bangunan }}</td>
            <td>{{ $item->tinggi_penyalur }}</td>
            <td>{{ $item->bentuk_elektroda }}</td>
            <td>{{ $item->alat_ukur }}</td>
            <td>{{ $item->pelaksana_pemasangan }}</td>
            <td>{{ $item->tanggal_berlaku_sampai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Surat Izin Operator</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Sertifikat</th>
            <th>Jenis Sertifikat</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($izin as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->no_sertifikat }}</td>
            <td>{{ $item->jenis_sertifikat }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Lain Lain</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Perijinan</th>
            <th>No Perijinan</th>
            <th>Diterbitkan Oleh</th>
            <th>Tanggal Dikeluarkan</th>
            <th>Tanggal Berlaku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lainLain as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->nama_perijinan }}</td>
            <td>{{ $item->no_perijinan }}</td>
            <td>{{ $item->di_terbitkan_oleh }}</td>
            <td>{{ $item->tanggal_dikeluarkan }}</td>
            <td>{{ $item->tanggal_berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
