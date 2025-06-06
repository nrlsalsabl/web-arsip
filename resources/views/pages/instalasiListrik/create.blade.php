<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Data Instalasi Listrik" :items="[
        ['label' => 'Instalasi Listrik', 'url' => route('instalasi-listrik.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('instalasi-listrik.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Jenis Arus --}}
                    <div class="w-full">
                        <x-form.label for="jenis_arus" class="font-semibold py-1">Jenis Arus</x-form.label>
                        <x-form.input value="{{ old('jenis_arus') }}" type="text" name="jenis_arus" id="jenis_arus" placeholder="Masukkan Jenis Arus" class="w-full" />
                        <x-form.error :messages="$errors->get('jenis_arus')" />
                    </div>

                    {{-- Jumlah Daya --}}
                    <div class="w-full">
                        <x-form.label for="jumlah_daya" class="font-semibold py-1">Jumlah Daya</x-form.label>
                        <x-form.input value="{{ old('jumlah_daya') }}" type="text" name="jumlah_daya" id="jumlah_daya" placeholder="Masukkan Jumlah Daya" class="w-full" />
                        <x-form.error :messages="$errors->get('jumlah_daya')" />
                    </div>

                    {{-- Sumber Tenaga Listrik --}}
                    <div class="w-full">
                        <x-form.label for="sumber_tenaga_listrik" class="font-semibold py-1">Sumber Tenaga Listrik</x-form.label>
                        <x-form.input value="{{ old('sumber_tenaga_listrik') }}" type="text" name="sumber_tenaga_listrik" id="sumber_tenaga_listrik" placeholder="Masukkan Sumber Tenaga Listrik" class="w-full" />
                        <x-form.error :messages="$errors->get('sumber_tenaga_listrik')" />
                    </div>

                    {{-- No Pengasahaan --}}
                    <div class="w-full">
                        <x-form.label for="no_pengasahaan" class="font-semibold py-1">No Pengasahaan</x-form.label>
                        <x-form.input value="{{ old('no_pengasahaan') }}" type="text" name="no_pengasahaan" id="no_pengasahaan" placeholder="Masukkan No Pengasahaan" class="w-full" />
                        <x-form.error :messages="$errors->get('no_pengasahaan')" />
                    </div>

                    {{-- Tanggal Berlaku --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                        <x-form.input value="{{ old('tanggal_berlaku') }}" type="date" name="tanggal_berlaku" id="tanggal_berlaku" class="w-full" />
                        <x-form.error :messages="$errors->get('tanggal_berlaku')" />
                    </div>

                    {{-- Tanggal Input --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_input" class="font-semibold py-1">Tanggal Input</x-form.label>
                        <x-form.input value="{{ old('tanggal_input') }}" type="date" name="tanggal_input" id="tanggal_input" class="w-full" />
                        <x-form.error :messages="$errors->get('tanggal_input')" />
                    </div>

                    {{-- Status --}}
                    <div class="w-full">
                        <x-form.label for="status" class="font-semibold py-1">Status</x-form.label>
                        <x-form.select name="status" id="status" class="w-full">
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </x-form.select>
                        <x-form.error :messages="$errors->get('status')" />
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
