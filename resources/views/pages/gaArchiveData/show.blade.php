<x-app-layout>
    <x-slot name="header">
        {{-- Header opsional --}}
    </x-slot>

    <x-breadcrumb title="Detail Arsip" :items="[
        ['label' => 'Arsip', 'url' => route('ga-archive.index')],
        ['label' => 'Detail Arsip']
    ]" />

    <div class="space-y-6">
        <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <h2 class="text-xl font-bold mb-4">Informasi Arsip</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 dark:text-gray-200">
                <div><strong>No:</strong> {{ $gaArchiveData->no ?? '-' }}</div>
                <div><strong>Filling Number:</strong> {{ $gaArchiveData->filling_number }}</div>
                <div><strong>Cabinet Number:</strong> {{ $gaArchiveData->cabinet_number }}</div>
                <div><strong>Nama Dokumen:</strong> {{ $gaArchiveData->document_name }}</div>
                <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($gaArchiveData->date)->format('d-m-Y') }}</div>
                <div><strong>Kategori:</strong> {{ $gaArchiveData->category }}</div>
                <div><strong>Jumlah Akses:</strong> {{ $gaArchiveData->access_count ?? 0 }}</div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2">File Dokumen:</h3>
                @if($gaArchiveData->document_file)
                    <a href="{{ asset('storage/'.$gaArchiveData->document_file) }}" target="_blank" class="text-blue-500 hover:underline">
                        Lihat / Unduh File
                    </a>
                @else
                    <p class="text-red-500">Tidak ada file terlampir.</p>
                @endif
            </div>

            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2">QR Code:</h3>
                @if($gaArchiveData->is_generate_qrcode && $gaArchiveData->unique_id !== '0')
                    <img src="{{ route('ga-archive.qrcode', $gaArchiveData->id) }}" alt="QR Code" width="200" height="200">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        Arahkan kamera untuk mengakses halaman ini.
                    </p>
                @else
                    <p class="text-red-500">QR Code belum digenerate untuk arsip ini.</p>
                @endif
            </div>

            <div class="mt-6">
                <x-button href="{{ route('ga-archive.index') }}" variant="secondary">
                    Kembali ke Daftar Arsip
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
