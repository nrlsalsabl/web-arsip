<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2> --}}
    </x-slot>
    <x-breadcrumb title="Bejana Tekan" :items="[
    ['label' => 'Data Master', 'url' => route('dashboard')],
    ['label' => 'Bejana Tekan']
]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <div>
                    {{-- <h1 class="text-2xl font-bold">Bejana Tekan</h1> --}}
                </div>
                <x-button
                href="{{ route('bejana-tekan.create') }}"
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
                                Kode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Validity Period
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bejanas as $item)          
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->kode }}
                            </td>
                            <td class="px-6 py-4">
                               @if ($item->status == 'active')
                                 <x-badge status="active">Active</x-badge>
                                 @else  
                                 <x-badge status="inactive">Inactive</x-badge>  
                                 @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->jenis_pesawat }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <x-button
                href="{{ route('bejana-tekan.show',$item->id) }}"
                variant="info"
                size="sm"

                class="items-center w-max p-0 gap-2"
            >
            <i class="fa-solid fa-eye"></i>
        </x-button>
                                    <x-button
                href="{{ route('bejana-tekan.edit',$item->id) }}"
                variant="warning"
                size="sm"

                class="items-center w-max p-0 gap-2"
            >
            <i class="fa-solid fa-edit"></i>
        </x-button>
        <form id="delete-form" action="{{ route('bejana-tekan.destroy',$item->id) }}" method="POST">
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
                        <td colspan="5" class="px-6 text-center py-4">
                            Tidak ada Data 
                        </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
