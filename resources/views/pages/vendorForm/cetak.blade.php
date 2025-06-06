<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Kerja Sama</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            line-height: 1.6;
        }
        .text-right {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
        .mt-2 { margin-top: 10px; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <x-kop-surat/>
    <div class="text-right">
        Jakarta, 05 February 2022
    </div>

    <p><strong>Nomor</strong> : GA/PI01/I/2025<br>
       <strong>Perihal</strong> : Pengajuan Kerja Sama</p>

    <p>Kepada Yth.<br>
       Manajemen PT OPQ<br>
       Di Tempat</p>

    <p>Dengan Hormat,<br>
    Sehubungan dengan kebutuhan operasional perusahaan, bersama ini kami dari PT XYZ mengajukan permohonan kerja sama serta pendaftaran PT OPQ sebagai vendor resmi dengan rincian informasi sebagai berikut :</p>

    <p><strong>Nama Perusahaan</strong> : {{ $vendor->full_company_name }}<br>
       <strong>Bidang Usaha</strong> : {{ $vendor->core_of_business }}<br>
       <strong>NPWP</strong> : {{$vendor->npwd}}</p>

    <p class="bold">Alamat Perusahaan:</p>
    <p>{{ $vendor->address }}</p>

    <p class="bold">Kontak Perusahaan:</p>
    <p>
        Telepon : {{ $vendor->phone }}<br>
        Fax : {{ $vendor->fax }}<br>
        Website : {{ $vendor->website }}
    </p>

    <p class="bold">Ketentuan Perdagangan:</p>
    <p>
        Tranding Terms: {{ $vendor->trading_term }}<br>
        Payment Terms: {{ $vendor->payment_term }}
    </p>

    <p class="bold">Informasi Kontak Person:</p>
    <p>
        Nama : {{$vendor->contact_name}}<br>
        Jabatan : {{$vendor->contact_position}}<br>
        Email : {{$vendor->email_address}}<br>
        No. Hp : {{ $vendor->mobile_number }}
    </p>

    <p class="bold">Tanggal Kadaluwarsa Dokumen : {{ \Carbon\Carbon::parse($vendor->document_expiry_date)->translatedFormat('d F Y') }}</p>

    <p>
        Demikian Pengajuan ini Kami Sampaikan. Besar harapan kami agar dapat segera terjalin kerja sama yang baik antara PT XYZ dan PT OPQ. Atas Perhatian dan kerja samanya, kami ucapkan terima kasih.
    </p>
    <x-signature :manajer="$manajer"/>
</body>
</html>
