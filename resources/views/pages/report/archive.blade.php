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
                   <form action="{{ route('report.archive') }}" method="GET" class="flex items-center gap-3">
                    @csrf
                    <div class="w-full">
                        <x-form.label class="font-semibold py-1" for="category">Categori</x-form.label>
                        <x-form.select class="w-[200px]" name="category" id="category">
                            <option value="">Pilih status</option>
                            <option value="ga-archive">Ga Archive</option>
                            <option value="vendor-archive">Vendor Archive</option>
                        </x-form.select>
                        <x-form.error :messages="$errors->get('category')" />
                    </div>
                    <div class="w-full">
                        <x-form.label class="font-semibold py-1" for="status">Cabinet Number</x-form.label>
                        <x-form.select class="w-[200px]" name="cabinet_number" id="cabinet_number">
                            <option value="">Pilih cabinet_number</option>
                            {{-- Option akan diisi via JavaScript --}}
                        </x-form.select>                        
                        <x-form.error :messages="$errors->get('cabinet_number')" />
                    </div>
                    <div class="w-full pt-6">
                        <x-button
                            type="submit"
                        variant="primary"
                        size="base"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Filter</span>
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
                                Cabinet Number
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
                                {{ $item->cabinet_number }}
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
<script>

 $('#category').on('change', function () {
        const category = $(this).val();

        // Clear dropdown dulu
        $('#cabinet_number').html('<option value="">Loading...</option>');

        $.ajax({
            url: "{{ route('get.cabinet.number') }}", // Buat route ini
            type: "GET",
            data: { category: category },
            success: function (data) {
                let options = '<option value="">Pilih cabinet_number</option>';
                data.forEach(function (item) {
                    options += `<option value="${item.cabinet_number}">${item.cabinet_number}</option>`;
                });
                $('#cabinet_number').html(options);
            },
            error: function () {
                $('#cabinet_number').html('<option value="">Gagal memuat data</option>');
            }
        });
    });

</script>
