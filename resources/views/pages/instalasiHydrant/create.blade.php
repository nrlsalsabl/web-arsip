<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Sistem instalasi-hydrant" :items="[
        ['label' => 'Sistem instalasi-hydrant', 'url' => route('instalasi-hydrant.index')],
        ['label' => 'Tambah Sistem instalasi-hydrant']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('instalasi-hydrant.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Kode --}}
                    <div class="w-full">
                        <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                        <x-form.input value="{{ old('kode') }}" type="text" name="kode" id="kode" placeholder="Masukkan Kode" class="w-full" />
                        <x-form.error :messages="$errors->get('kode')" />
                    </div>

                    {{-- Kapasitas --}}
                    <div class="w-full">
                        <x-form.label for="kapasitas" class="font-semibold py-1">Kapasitas</x-form.label>
                        <x-form.input value="{{ old('kapasitas') }}" type="text" name="kapasitas" id="kapasitas" placeholder="Masukkan Kapasitas" class="w-full" />
                        <x-form.error :messages="$errors->get('kapasitas')" />
                    </div>

                    {{-- Pilar instalasi-hydrant --}}
                    <div class="w-full">
                        <x-form.label for="pilar_instalasi-hydrant" class="font-semibold py-1">Pilar instalasi-hydrant</x-form.label>
                        <x-form.input value="{{ old('pilar_hydrant') }}" type="text" name="pilar_hydrant" id="pilar_instalasi-hydrant" placeholder="Masukkan Pilar instalasi-hydrant" class="w-full" />
                        <x-form.error :messages="$errors->get('pilar_hydrant')" />
                    </div>

                    {{-- Kontak instalasi-hydrant --}}
                    <div class="w-full">
                        <x-form.label for="kontak_instalasi-hydrant" class="font-semibold py-1">Kontak instalasi-hydrant</x-form.label>
                        <x-form.input value="{{ old('kontak_hydrant') }}" type="text" name="kontak_hydrant" id="kontak_instalasi-hydrant" placeholder="Masukkan Kontak instalasi-hydrant" class="w-full" />
                        <x-form.error :messages="$errors->get('kontak_hydrant')" />
                    </div>

                    {{-- Selang --}}
                    <div class="w-full">
                        <x-form.label for="selang" class="font-semibold py-1">Selang</x-form.label>
                        <x-form.input value="{{ old('selang') }}" type="text" name="selang" id="selang" placeholder="Masukkan Selang" class="w-full" />
                        <x-form.error :messages="$errors->get('selang')" />
                    </div>

                    {{-- Hose Reel --}}
                    <div class="w-full">
                        <x-form.label for="hose_reel" class="font-semibold py-1">Hose Reel</x-form.label>
                        <x-form.input value="{{ old('hose_reel') }}" type="text" name="hose_reel" id="hose_reel" placeholder="Masukkan Hose Reel" class="w-full" />
                        <x-form.error :messages="$errors->get('hose_reel')" />
                    </div>

                    {{-- Pipa Pancar --}}
                    <div class="w-full">
                        <x-form.label for="pipa_pancar" class="font-semibold py-1">Pipa Pancar</x-form.label>
                        <x-form.input value="{{ old('pipa_pancar') }}" type="text" name="pipa_pancar" id="pipa_pancar" placeholder="Masukkan Pipa Pancar" class="w-full" />
                        <x-form.error :messages="$errors->get('pipa_pancar')" />
                    </div>

                    {{-- Mesin Penggerak --}}
                    <div class="w-full">
                        <x-form.label for="mesin_penggerak" class="font-semibold py-1">Mesin Penggerak</x-form.label>
                        <x-form.input value="{{ old('mesin_penggerak') }}" type="text" name="mesin_penggerak" id="mesin_penggerak" placeholder="Masukkan Mesin Penggerak" class="w-full" />
                        <x-form.error :messages="$errors->get('mesin_penggerak')" />
                    </div>

                    {{-- Pompa --}}
                    <div class="w-full">
                        <x-form.label for="pompa" class="font-semibold py-1">Pompa</x-form.label>
                        <x-form.input value="{{ old('pompa') }}" type="text" name="pompa" id="pompa" placeholder="Masukkan Pompa" class="w-full" />
                        <x-form.error :messages="$errors->get('pompa')" />
                    </div>

                    {{-- Tekanan Kerja Maksimal --}}
                    <div class="w-full">
                        <x-form.label for="tekanan_kerja_max" class="font-semibold py-1">Tekanan Kerja Maks</x-form.label>
                        <x-form.input value="{{ old('tekanan_kerja_max') }}" type="number" step="any" name="tekanan_kerja_max" id="tekanan_kerja_max" placeholder="Masukkan Tekanan Kerja Maksimal" class="w-full" />
                        <x-form.error :messages="$errors->get('tekanan_kerja_max')" />
                    </div>

                    {{-- No Ijin Pemakaian --}}
                    <div class="w-full">
                        <x-form.label for="no_ijin_pemakaian" class="font-semibold py-1">No Ijin Pemakaian</x-form.label>
                        <x-form.input value="{{ old('no_ijin_pemakaian') }}" type="text" name="no_ijin_pemakaian" id="no_ijin_pemakaian" placeholder="Masukkan No Ijin Pemakaian" class="w-full" />
                        <x-form.error :messages="$errors->get('no_ijin_pemakaian')" />
                    </div>

                    {{-- Tanggal Berlaku s/d --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_berlaku_sd" class="font-semibold py-1">Tanggal Berlaku s/d</x-form.label>
                        <x-form.input value="{{ old('tanggal_berlaku_sd') }}" type="date" name="tanggal_berlaku_sd" id="tanggal_berlaku_sd" class="w-full" />
                        <x-form.error :messages="$errors->get('tanggal_berlaku_sd')" />
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
                            <option value="">Pilih status</option>
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
