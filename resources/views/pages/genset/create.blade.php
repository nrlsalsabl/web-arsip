<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Data Genset" :items="[
        ['label' => 'Genset', 'url' => route('genset.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('genset.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Kode --}}
                    <div class="w-full">
                        <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                        <x-form.input value="{{ old('kode') }}" type="text" name="kode" id="kode" placeholder="Masukkan Kode" class="w-full" />
                        <x-form.error :messages="$errors->get('kode')" />
                    </div>

                    {{-- Jenis Alat --}}
                    <div class="w-full">
                        <x-form.label for="jenis_alat" class="font-semibold py-1">Jenis Alat</x-form.label>
                        <x-form.input value="{{ old('jenis_alat') }}" type="text" name="jenis_alat" id="jenis_alat" placeholder="Masukkan Jenis Alat" class="w-full" />
                        <x-form.error :messages="$errors->get('jenis_alat')" />
                    </div>

                    {{-- Nama Pabrik Pembuatan --}}
                    <div class="w-full">
                        <x-form.label for="nama_pabrik_pembuatan" class="font-semibold py-1">Nama Pabrik Pembuatan</x-form.label>
                        <x-form.input value="{{ old('nama_pabrik_pembuatan') }}" type="text" name="nama_pabrik_pembuatan" id="nama_pabrik_pembuatan" placeholder="Masukkan Nama Pabrik Pembuatan" class="w-full" />
                        <x-form.error :messages="$errors->get('nama_pabrik_pembuatan')" />
                    </div>

                    {{-- Tempat Pembuatan --}}
                    <div class="w-full">
                        <x-form.label for="tempat_pembuatan" class="font-semibold py-1">Tempat Pembuatan</x-form.label>
                        <x-form.input value="{{ old('tempat_pembuatan') }}" type="text" name="tempat_pembuatan" id="tempat_pembuatan" placeholder="Masukkan Tempat Pembuatan" class="w-full" />
                        <x-form.error :messages="$errors->get('tempat_pembuatan')" />
                    </div>

                    {{-- Nomor Pabrik Pembuatan --}}
                    <div class="w-full">
                        <x-form.label for="nomor_pabrik_pembuatan" class="font-semibold py-1">Nomor Pabrik Pembuatan</x-form.label>
                        <x-form.input value="{{ old('nomor_pabrik_pembuatan') }}" type="text" name="nomor_pabrik_pembuatan" id="nomor_pabrik_pembuatan" placeholder="Masukkan Nomor Pabrik Pembuatan" class="w-full" />
                        <x-form.error :messages="$errors->get('nomor_pabrik_pembuatan')" />
                    </div>

                    {{-- Daya --}}
                    <div class="w-full">
                        <x-form.label for="daya" class="font-semibold py-1">Daya</x-form.label>
                        <x-form.input value="{{ old('daya') }}" type="text" name="daya" id="daya" placeholder="Masukkan Daya" class="w-full" />
                        <x-form.error :messages="$errors->get('daya')" />
                    </div>

                    {{-- No Pengesahan --}}
                    <div class="w-full">
                        <x-form.label for="no_pengesahan" class="font-semibold py-1">No Pengesahan</x-form.label>
                        <x-form.input value="{{ old('no_pengesahan') }}" type="text" name="no_pengesahan" id="no_pengesahan" placeholder="Masukkan No Pengesahan" class="w-full" />
                        <x-form.error :messages="$errors->get('no_pengesahan')" />
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
