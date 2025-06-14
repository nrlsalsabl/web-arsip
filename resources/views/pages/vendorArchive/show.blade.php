<x-app-layout>
    <x-slot name="header">
        {{-- Header opsional --}}
    </x-slot>

    <x-breadcrumb title="Detail Arsip Vendor" :items="[
        ['label' => 'Arsip Vendor', 'url' => route('vendor-archive.index')],
        ['label' => 'Detail Arsip']
    ]" />

    <div class="space-y-6">
        <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Informasi Arsip Vendor</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 dark:text-gray-200">
                <div><strong>No:</strong> {{ $vendorArchiveData->no ?? '-' }}</div>
                <div><strong>Filling Number:</strong> {{ $vendorArchiveData->filling_number }}</div>
                <div><strong>Cabinet Number:</strong> {{ $vendorArchiveData->cabinet_number }}</div>
                <div><strong>Nama Dokumen:</strong> {{ $vendorArchiveData->document_number }}</div>
                <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($vendorArchiveData->date)->format('d-m-Y') }}</div>
                <div><strong>Perusahaan:</strong> {{ $vendorArchiveData->company_name }}</div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2">File Dokumen:</h3>
                @if($vendorArchiveData->file_document)
                    <a href="{{ asset('storage/vendor-documents/'.$vendorArchiveData->file_document) }}" target="_blank" class="text-blue-500 hover:underline">
                        Lihat / Unduh File
                    </a>
                @else
                    <p class="text-red-500">Tidak ada file terlampir.</p>
                @endif
            </div>

            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2">QR Code:</h3>
                @if($vendorArchiveData->is_generate_qrcode && $vendorArchiveData->unique_id !== '0')
                    <img src="{{ route('vendor-archive.qrcode', $vendorArchiveData->id) }}" alt="QR Code" width="200">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        Arahkan kamera untuk mengakses halaman ini.
                    </p>
                @else
                    <p class="text-red-500">QR Code belum digenerate untuk arsip ini.</p>
                @endif
            </div>

            <div class="mt-6">
                <x-button href="{{ route('vendor-archive.index') }}" variant="secondary">
                    Kembali ke Daftar Arsip
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
