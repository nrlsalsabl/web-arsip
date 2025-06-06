<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Data Lain-lain" :items="[
        ['label' => 'Lain-lain', 'url' => route('lain-lain.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('lain-lain.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Kode --}}
                    <div class="w-full">
                        <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                        <x-form.input value="{{ old('kode') }}" type="text" name="kode" id="kode" placeholder="Masukkan Kode" class="w-full" />
                        <x-form.error :messages="$errors->get('kode')" />
                    </div>

                    {{-- Nama Perijinan --}}
                    <div class="w-full">
                        <x-form.label for="nama_perijinan" class="font-semibold py-1">Nama Perijinan</x-form.label>
                        <x-form.input value="{{ old('nama_perijinan') }}" type="text" name="nama_perijinan" id="nama_perijinan" placeholder="Masukkan Nama Perijinan" class="w-full" />
                        <x-form.error :messages="$errors->get('nama_perijinan')" />
                    </div>

                    {{-- No Perijinan --}}
                    <div class="w-full">
                        <x-form.label for="no_perijinan" class="font-semibold py-1">No Perijinan</x-form.label>
                        <x-form.input value="{{ old('no_perijinan') }}" type="text" name="no_perijinan" id="no_perijinan" placeholder="Masukkan Nomor Perijinan" class="w-full" />
                        <x-form.error :messages="$errors->get('no_perijinan')" />
                    </div>

                    {{-- Diterbitkan Oleh --}}
                    <div class="w-full">
                        <x-form.label for="di_terbitkan_oleh" class="font-semibold py-1">Diterbitkan Oleh</x-form.label>
                        <x-form.input value="{{ old('di_terbitkan_oleh') }}" type="text" name="di_terbitkan_oleh" id="di_terbitkan_oleh" placeholder="Masukkan Nama Instansi" class="w-full" />
                        <x-form.error :messages="$errors->get('di_terbitkan_oleh')" />
                    </div>

                    {{-- Tanggal Dikeluarkan --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_dikeluarkan" class="font-semibold py-1">Tanggal Dikeluarkan</x-form.label>
                        <x-form.input value="{{ old('tanggal_dikeluarkan') }}" type="date" name="tanggal_dikeluarkan" id="tanggal_dikeluarkan" class="w-full" />
                        <x-form.error :messages="$errors->get('tanggal_dikeluarkan')" />
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
