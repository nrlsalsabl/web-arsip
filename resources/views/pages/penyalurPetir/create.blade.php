<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Data Penyalur Petir" :items="[
        ['label' => 'Penyalur Petir', 'url' => route('penyalur-petir.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('penyalur-petir.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Kode --}}
                    <div class="w-full">
                        <x-form.label for="kode">Kode</x-form.label>
                        <x-form.input class="w-full" name="kode" id="kode" value="{{ old('kode') }}" placeholder="Masukkan Kode" />
                        <x-form.error :messages="$errors->get('kode')" />
                    </div>

                    {{-- Jenis Penyalur Petir --}}
                    <div class="w-full">
                        <x-form.label for="jenis_penyalur_petir">Jenis Penyalur Petir *</x-form.label>
                        <x-form.input class="w-full" name="jenis_penyalur_petir" id="jenis_penyalur_petir" value="{{ old('jenis_penyalur_petir') }}" required />
                        <x-form.error :messages="$errors->get('jenis_penyalur_petir')" />
                    </div>

                    {{-- Radius Proteksi --}}
                    <div class="w-full">
                        <x-form.label for="radius_proteksi">Radius Proteksi *</x-form.label>
                        <x-form.input class="w-full" name="radius_proteksi" id="radius_proteksi" value="{{ old('radius_proteksi') }}" required />
                        <x-form.error :messages="$errors->get('radius_proteksi')" />
                    </div>

                    {{-- Panjang Bangunan --}}
                    <div class="w-full">
                        <x-form.label for="panjang_bangunan">Panjang Bangunan *</x-form.label>
                        <x-form.input class="w-full" name="panjang_bangunan" id="panjang_bangunan" value="{{ old('panjang_bangunan') }}" required />
                        <x-form.error :messages="$errors->get('panjang_bangunan')" />
                    </div>

                    {{-- Lebar Bangunan --}}
                    <div class="w-full">
                        <x-form.label for="lebar_bangunan">Lebar Bangunan *</x-form.label>
                        <x-form.input class="w-full" name="lebar_bangunan" id="lebar_bangunan" value="{{ old('lebar_bangunan') }}" required />
                        <x-form.error :messages="$errors->get('lebar_bangunan')" />
                    </div>

                    {{-- Tinggi Penyalur --}}
                    <div class="w-full">
                        <x-form.label for="tinggi_penyalur">Tinggi Penyalur *</x-form.label>
                        <x-form.input class="w-full" name="tinggi_penyalur" id="tinggi_penyalur" value="{{ old('tinggi_penyalur') }}" required />
                        <x-form.error :messages="$errors->get('tinggi_penyalur')" />
                    </div>

                    {{-- Bentuk Elektroda --}}
                    <div class="w-full">
                        <x-form.label for="bentuk_elektroda">Bentuk Elektroda *</x-form.label>
                        <x-form.input class="w-full" name="bentuk_elektroda" id="bentuk_elektroda" value="{{ old('bentuk_elektroda') }}" required />
                        <x-form.error :messages="$errors->get('bentuk_elektroda')" />
                    </div>

                    {{-- Alat Ukur --}}
                    <div class="w-full">
                        <x-form.label for="alat_ukur">Alat Ukur *</x-form.label>
                        <x-form.input class="w-full" name="alat_ukur" id="alat_ukur" value="{{ old('alat_ukur') }}" required />
                        <x-form.error :messages="$errors->get('alat_ukur')" />
                    </div>

                    {{-- Pelaksana Pemasangan --}}
                    <div class="w-full">
                        <x-form.label for="pelaksana_pemasangan">Pelaksana Pemasangan *</x-form.label>
                        <x-form.input class="w-full" name="pelaksana_pemasangan" id="pelaksana_pemasangan" value="{{ old('pelaksana_pemasangan') }}" required />
                        <x-form.error :messages="$errors->get('pelaksana_pemasangan')" />
                    </div>

                    {{-- Tanggal Berlaku Sampai --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_berlaku_sampai">Tanggal Berlaku s/d *</x-form.label>
                        <x-form.input class="w-full" type="date" name="tanggal_berlaku_sampai" id="tanggal_berlaku_sampai" value="{{ old('tanggal_berlaku_sampai') }}" required />
                        <x-form.error :messages="$errors->get('tanggal_berlaku_sampai')" />
                    </div>

                    {{-- Tanggal Input --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_input">Tanggal Input</x-form.label>
                        <x-form.input class="w-full" type="date" name="tanggal_input" id="tanggal_input" value="{{ old('tanggal_input') }}" />
                        <x-form.error :messages="$errors->get('tanggal_input')" />
                    </div>

                    {{-- Status --}}
                    <div class="w-full">
                        <x-form.label for="status">Status</x-form.label>
                        <select name="status" id="status" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Status --</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
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
