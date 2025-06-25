<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Laporan Arsip') }}
        </h2>
    </x-slot>

    <x-breadcrumb title="Laporan Arsip" :items="[
        ['label' => 'Report', 'url' => route('dashboard')],
        ['label' => 'Data Arsip']
    ]" />

    <div class="space-y-6">
        <div class="p-4 sm:p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <div>
                    <x-button href="?export=excel" variant="success">Download Excel</x-button>
                </div>
                <div>
                    <x-button href="?export=pdf" variant="danger">Download PDF</x-button>
                </div>
            </div>

            {{-- GA Archive Table --}}
            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">GA Archive</h3>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-white">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Filling Number</th>
                            <th class="px-4 py-2 border">Cabinet Number</th>
                            <th class="px-4 py-2 border">Document Name</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gaData as $i => $item)
                        <tr class="bg-white dark:bg-gray-900">
                            <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $item->filling_number }}</td>
                            <td class="px-4 py-2 border">{{ $item->cabinet_number }}</td>
                            <td class="px-4 py-2 border">{{ $item->document_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->date }}</td>
                            <td class="px-4 py-2 border">{{ $item->category }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data GA Archive</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Vendor Archive Table --}}
            <h3 class="text-lg font-bold text-gray-800 dark:text-white mt-8 mb-2">Vendor Archive</h3>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-white">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Filling Number</th>
                            <th class="px-4 py-2 border">Cabinet Number</th>
                            <th class="px-4 py-2 border">Document Number</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendorData as $i => $item)
                        <tr class="bg-white dark:bg-gray-900">
                            <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $item->filling_number }}</td>
                            <td class="px-4 py-2 border">{{ $item->cabinet_number }}</td>
                            <td class="px-4 py-2 border">{{ $item->document_number }}</td>
                            <td class="px-4 py-2 border">{{ $item->date }}</td>
                            <td class="px-4 py-2 border">{{ $item->company_name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data Vendor Archive</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
