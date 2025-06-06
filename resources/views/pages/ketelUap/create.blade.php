<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Data Ketel Uap" :items="[
        ['label' => 'Ketel Uap', 'url' => route('ketel-uap.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('ketel-uap.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Kode --}}
                    <div class="w-full">
                        <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                        <x-form.input value="{{ old('kode') }}" type="text" name="kode" id="kode" placeholder="Masukkan Kode" class="w-full" />
                        <x-form.error :messages="$errors->get('kode')" />
                    </div>

                    {{-- Nama --}}
                    <div class="w-full">
                        <x-form.label for="nama" class="font-semibold py-1">Nama</x-form.label>
                        <x-form.input value="{{ old('nama') }}" type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="w-full" />
                        <x-form.error :messages="$errors->get('nama')" />
                    </div>

                    {{-- Akte Izin No --}}
                    <div class="w-full">
                        <x-form.label for="akte_izin_no" class="font-semibold py-1">Akte Izin No</x-form.label>
                        <x-form.input value="{{ old('akte_izin_no') }}" type="text" name="akte_izin_no" id="akte_izin_no" placeholder="Masukkan Nomor Akte Izin" class="w-full" />
                        <x-form.error :messages="$errors->get('akte_izin_no')" />
                    </div>

                    {{-- Tanggal Berlaku --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                        <x-form.input value="{{ old('tanggal_berlaku') }}" type="date" name="tanggal_berlaku" id="tanggal_berlaku" class="w-full" />
                        <x-form.error :messages="$errors->get('tanggal_berlaku')" />
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="submit" variant="primary" size="lg" class="items-center max-w-xs gap-2">
                        <span>Simpan</span>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
