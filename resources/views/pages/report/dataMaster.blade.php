<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2> --}}
    </x-slot>
    <x-breadcrumb title="Vendor" :items="[
    ['label' => 'Report', 'url' => route('dashboard')],
    ['label' => 'Data Master']
]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex mb-4">
                <div>
                    {{-- filter --}}
                   <form action="{{ route('report.data-master') }}" method="GET" class="flex items-center gap-3">
                    @csrf
                    <div class="w-full">
                        <x-form.label class="font-semibold py-1" for="category">Categori</x-form.label>
                        <x-form.select class="w-[200px]" name="category" id="category">
                            <option value="">Pilih status</option>
                            <option value="bejana-tekan">Bejana Tekan</option>
                            <option value="instalasi-hydrant">Instalasi Hydrant</option>
                            <option value="instalasi-listrik">Instalasi Listrik</option>
                            <option value="genset">Genset</option>
                            <option value="surat-izin-operator">Surat Izin Operator</option>
                            <option value="penyalur-petir">Penyalur Petir</option>
                        </x-form.select>
                        <x-form.error :messages="$errors->get('status')" />
                    </div>
                    <div class="w-full">
                        <x-form.label class="font-semibold py-1" for="status">Status</x-form.label>
                        <x-form.select class="w-[200px]" name="status" id="status">
                            <option value="">Pilih status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </x-form.select>
                        <x-form.error :messages="$errors->get('status')" />
                    </div>
                    <div class="w-full flex gap-2 pt-6">
                        <x-button
                        name="action"
                        value="filter"
                        type="submit"
                        variant="primary"
                        size="base"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Filter</span>
                    </x-button>
                        <x-button
                        name="action"
                        value="print"
                        type="submit"
                        variant="warning"
                        size="base"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Print</span>
                    </x-button>
                    </div>
                   </form>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="min-w-full table-fixed text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3 w-[50px] text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-2 py-4 font-medium text-center text-gray-900 dark:text-white w-[50px]">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $categoryName }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 'active')
                                    <x-badge status="active">Active</x-badge>
                                @else
                                    <x-badge status="inactive">Inactive</x-badge>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="px-6 text-center py-4">
                                Tidak ada Data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</x-app-layout>
