<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Laporan Data Master') }}
        </h2>
    </x-slot>

    <x-breadcrumb title="Laporan Data Master" :items="[['label' => 'Report', 'url' => route('dashboard')], ['label' => 'Data Master']]"/>

    <div class="space-y-6">
        <div class="p-4 sm:p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <x-button href="?export=excel" variant="success">Download Excel</x-button>
                <x-button href="?export=pdf" variant="danger">Download PDF</x-button>
            </div>

           @php
$lists = [
    [
        'title' => 'Bejana Tekan',
        'data' => $bejanaTekan,
        'fields' => [
            'kode', 'jenis_pesawat', 'tempat_pembuatan', 'no_seri', 'bentuk_bejana',
            'tekanan_kerja', 'volume', 'bahan_diisi', 'no_izin_pemakaian', 'tanggal_berlaku'
        ],
    ],
    [
        'title' => 'Instalasi Hydrant',
        'data' => $hydrant,
        'fields' => [
            'kode', 'kapasitas', 'pilar_hydrant', 'kontak_hydrant', 'selang',
            'hose_reel', 'pipa_pancar', 'mesin_penggerak', 'pompa', 'tekanan_kerja_max',
            'no_ijin_pemakaian', 'tanggal_berlaku_sd'
        ],
    ],
    [
        'title' => 'Instalasi Listrik',
        'data' => $listrik,
        'fields' => [
            'jenis_arus', 'jumlah_daya', 'sumber_tenaga_listrik',
            'no_pengasahaan', 'tanggal_berlaku'
        ],
    ],
    [
        'title' => 'Genset',
        'data' => $genset,
        'fields' => [
            'kode', 'jenis_alat', 'nama_pabrik_pembuatan', 'tempat_pembuatan',
            'nomor_pabrik_pembuatan', 'daya', 'no_pengesahan', 'tanggal_berlaku'
        ],
    ],
    [
        'title' => 'Ketel Uap',
        'data' => $ketelUap,
        'fields' => ['kode', 'nama', 'akte_izin_no', 'tanggal_berlaku'],
    ],
    [
        'title' => 'Penyalur Petir',
        'data' => $petir,
        'fields' => [
            'kode', 'jenis_penyalur_petir', 'radius_proteksi', 'panjang_bangunan',
            'lebar_bangunan', 'tinggi_penyalur', 'bentuk_elektroda',
            'alat_ukur', 'pelaksana_pemasangan', 'tanggal_berlaku_sampai'
        ],
    ],
    [
        'title' => 'Surat Izin Operator',
        'data' => $izin,
        'fields' => ['no_sertifikat', 'jenis_sertifikat', 'tanggal_berlaku'],
    ],
    [
        'title' => 'Lain Lain',
        'data' => $lainLain,
        'fields' => [
            'kode', 'nama_perijinan', 'no_perijinan',
            'di_terbitkan_oleh', 'tanggal_dikeluarkan', 'tanggal_berlaku'
        ],
    ],
];
@endphp


            @foreach($lists as $list)
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mt-8 mb-2">{{ $list['title'] }}</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300 dark:border-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-white">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                @foreach($list['fields'] as $field)
                                    <th class="px-4 py-2 border">{{ ucwords(str_replace('_', ' ', $field)) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($list['data'] as $i => $item)
                                <tr class="bg-white dark:bg-gray-900">
                                    <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                                    @foreach($list['fields'] as $field)
                                        <td class="px-4 py-2 border">{{ $item->$field }}</td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($list['fields']) + 1 }}" class="px-4 py-2 border text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
