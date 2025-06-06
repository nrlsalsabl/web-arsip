<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2> --}}
    </x-slot>
    <x-breadcrumb title="Ga Archive Data" :items="[
    ['label' => 'Archive Data', 'url' => route('dashboard')],
    ['label' => 'Ga Archive Data']
]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <div>
                    {{-- <h1 class="text-2xl font-bold">Bejana Tekan</h1> --}}
                </div>
                <x-button
                href="{{ route('ga-archive.create') }}"
                variant="primary"
                size="base"
                class="items-center max-w-xs gap-2"
            >
                <span>+ Tambah</span>
            </x-button>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full py-3   text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class=" text-sm text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 ">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fiiling Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cabinet Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Document Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Upload Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($archives as $item)          
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->filling_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->cabinet_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->document_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->date }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <x-button
                                    href="{{ route('ga-archive.show',$item->id) }}"
                                    variant="primary"
                                    size="sm"
                    
                                    class="items-center w-max p-0 gap-2"
                                >
                                <i class="fa-solid fa-eye"></i>
                            </x-button>
                                    <x-button
                                    target="_blank"
                                    href="{{ route('ga-archive.qrcode',$item->id) }}"
                                    variant="info"
                                    size="sm"
                                    class="items-center w-max p-0 gap-2"
                                >
                                <i class="fa-solid fa-qrcode"></i>
                                </x-button>
                                    <x-button
                href="{{ route('ga-archive.edit',$item->id) }}"
                variant="warning"
                size="sm"

                class="items-center w-max p-0 gap-2"
            >
            <i class="fa-solid fa-edit"></i>
        </x-button>
        <form id="delete-form" action="{{ route('ga-archive.destroy',$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
       
                                    <x-button
                target="_blank"
                variant="danger"
                size="sm"
                type="button"
                 onclick="confirmDelete({{ $item->id }})"
                class="items-center w-max p-0 gap-2"
            >
            <i class="fa-solid fa-trash"></i>

            </x-button>
        </form>
                                   
                                </div>
                            </td>
                        </tr>
                        @empty   
                        <td colspan="10" class="px-6 text-center py-4">
                            Tidak ada Data 
                        </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
