<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Edit Data" :items="[
        ['label' => 'Data', 'url' => route('ketel-uap.index')],
        ['label' => 'Edit Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('ketel-uap.update', $ketelUap->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @php
                            $oldOrData = fn($field) => old($field, $ketelUap->$field ?? '');
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
                                class="w-full {{ inputBgClass($oldOrData('kode')) }}"
                            />
                            <x-form.error :messages="$errors->get('kode')" />
                        </div>

                        {{-- Nama --}}
                        <div class="w-full">
                            <x-form.label for="nama" class="font-semibold py-1">Nama</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('nama') }}"
                                type="text"
                                id="nama"
                                name="nama"
                                placeholder="Masukkan Nama"
                                class="w-full {{ inputBgClass($oldOrData('nama')) }}"
                            />
                            <x-form.error :messages="$errors->get('nama')" />
                        </div>

                        {{-- Akte Izin No --}}
                        <div class="w-full">
                            <x-form.label for="akte_izin_no" class="font-semibold py-1">Akte Izin No</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('akte_izin_no') }}"
                                type="text"
                                id="akte_izin_no"
                                name="akte_izin_no"
                                placeholder="Masukkan Nomor Akte Izin"
                                class="w-full {{ inputBgClass($oldOrData('akte_izin_no')) }}"
                            />
                            <x-form.error :messages="$errors->get('akte_izin_no')" />
                        </div>

                        {{-- Tanggal Berlaku --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tanggal_berlaku') }}"
                                type="date"
                                id="tanggal_berlaku"
                                name="tanggal_berlaku"
                                class="w-full {{ inputBgClass($oldOrData('tanggal_berlaku')) }}"
                            />
                            <x-form.error :messages="$errors->get('tanggal_berlaku')" />
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <div></div>
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
