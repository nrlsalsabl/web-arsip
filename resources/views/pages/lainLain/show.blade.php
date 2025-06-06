<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Detail Data Perijinan" :items="[
        ['label' => 'Perijinan', 'url' => route('lain-lain.index')],
        ['label' => 'Detail Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('lain-lain.update', $lainLain->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @php
                            $oldOrData = fn($field) => old($field, $lainLain->$field ?? '');
                        @endphp

                        {{-- Kode --}}
                        <div class="w-full">
                            <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('kode') }}"
                                type="text"
                                id="kode"
                                name="kode"
                                placeholder="Masukkan Kode"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('kode')" />
                        </div>

                        {{-- Nama Perijinan --}}
                        <div class="w-full">
                            <x-form.label for="nama_perijinan" class="font-semibold py-1">Nama Perijinan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('nama_perijinan') }}"
                                type="text"
                                id="nama_perijinan"
                                name="nama_perijinan"
                                placeholder="Masukkan Nama Perijinan"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('nama_perijinan')" />
                        </div>

                        {{-- Nomor Perijinan --}}
                        <div class="w-full">
                            <x-form.label for="no_perijinan" class="font-semibold py-1">No. Perijinan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('no_perijinan') }}"
                                type="text"
                                id="no_perijinan"
                                name="no_perijinan"
                                placeholder="Masukkan No. Perijinan"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('no_perijinan')" />
                        </div>

                        {{-- Diterbitkan Oleh --}}
                        <div class="w-full">
                            <x-form.label for="di_terbitkan_oleh" class="font-semibold py-1">Diterbitkan Oleh</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('di_terbitkan_oleh') }}"
                                type="text"
                                id="di_terbitkan_oleh"
                                name="di_terbitkan_oleh"
                                placeholder="Masukkan Instansi Penerbit"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('di_terbitkan_oleh')" />
                        </div>

                        {{-- Tanggal Dikeluarkan --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_dikeluarkan" class="font-semibold py-1">Tanggal Dikeluarkan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tanggal_dikeluarkan') }}"
                                type="date"
                                id="tanggal_dikeluarkan"
                                name="tanggal_dikeluarkan"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('tanggal_dikeluarkan')" />
                        </div>

                        {{-- Tanggal Berlaku --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tanggal_berlaku') }}"
                                type="date"
                                id="tanggal_berlaku"
                                name="tanggal_berlaku"
                                class="w-full"
                            />
                            <x-form.error :messages="$errors->get('tanggal_berlaku')" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-button
                            type="submit"
                            variant="primary"
                            size="lg"
                            class="items-center max-w-xs gap-2"
                        >
                            <span>Update</span>
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
