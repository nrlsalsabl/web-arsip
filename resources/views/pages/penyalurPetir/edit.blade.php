<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Edit Data" :items="[
        ['label' => 'Data', 'url' => route('penyalur-petir.index')],
        ['label' => 'Edit Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('penyalur-petir.update', $penyalurPetir->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    @php
                        $oldOrData = fn($field) => old($field, $penyalurPetir->$field ?? '');
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

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

                        {{-- Jenis Penyalur Petir --}}
                        <div class="w-full">
                            <x-form.label for="jenis_penyalur_petir" class="font-semibold py-1">Jenis Penyalur Petir</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jenis_penyalur_petir') }}"
                                type="text"
                                id="jenis_penyalur_petir"
                                name="jenis_penyalur_petir"
                                placeholder="Masukkan Jenis Penyalur Petir"
                                class="w-full {{ inputBgClass($oldOrData('jenis_penyalur_petir')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('jenis_penyalur_petir')" />
                        </div>

                        {{-- Radius Proteksi --}}
                        <div class="w-full">
                            <x-form.label for="radius_proteksi" class="font-semibold py-1">Radius Proteksi</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('radius_proteksi') }}"
                                type="text"
                                id="radius_proteksi"
                                name="radius_proteksi"
                                placeholder="Masukkan Radius Proteksi"
                                class="w-full {{ inputBgClass($oldOrData('radius_proteksi')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('radius_proteksi')" />
                        </div>

                        {{-- Panjang Bangunan --}}
                        <div class="w-full">
                            <x-form.label for="panjang_bangunan" class="font-semibold py-1">Panjang Bangunan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('panjang_bangunan') }}"
                                type="text"
                                id="panjang_bangunan"
                                name="panjang_bangunan"
                                placeholder="Masukkan Panjang Bangunan"
                                class="w-full {{ inputBgClass($oldOrData('panjang_bangunan')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('panjang_bangunan')" />
                        </div>

                        {{-- Lebar Bangunan --}}
                        <div class="w-full">
                            <x-form.label for="lebar_bangunan" class="font-semibold py-1">Lebar Bangunan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('lebar_bangunan') }}"
                                type="text"
                                id="lebar_bangunan"
                                name="lebar_bangunan"
                                placeholder="Masukkan Lebar Bangunan"
                                class="w-full {{ inputBgClass($oldOrData('lebar_bangunan')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('lebar_bangunan')" />
                        </div>

                        {{-- Tinggi Penyalur --}}
                        <div class="w-full">
                            <x-form.label for="tinggi_penyalur" class="font-semibold py-1">Tinggi Penyalur</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tinggi_penyalur') }}"
                                type="text"
                                id="tinggi_penyalur"
                                name="tinggi_penyalur"
                                placeholder="Masukkan Tinggi Penyalur"
                                class="w-full {{ inputBgClass($oldOrData('tinggi_penyalur')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('tinggi_penyalur')" />
                        </div>

                        {{-- Bentuk Elektroda --}}
                        <div class="w-full">
                            <x-form.label for="bentuk_elektroda" class="font-semibold py-1">Bentuk Elektroda</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('bentuk_elektroda') }}"
                                type="text"
                                id="bentuk_elektroda"
                                name="bentuk_elektroda"
                                placeholder="Masukkan Bentuk Elektroda"
                                class="w-full {{ inputBgClass($oldOrData('bentuk_elektroda')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('bentuk_elektroda')" />
                        </div>

                        {{-- Alat Ukur --}}
                        <div class="w-full">
                            <x-form.label for="alat_ukur" class="font-semibold py-1">Alat Ukur</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('alat_ukur') }}"
                                type="text"
                                id="alat_ukur"
                                name="alat_ukur"
                                placeholder="Masukkan Alat Ukur"
                                class="w-full {{ inputBgClass($oldOrData('alat_ukur')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('alat_ukur')" />
                        </div>

                        {{-- Pelaksana Pemasangan --}}
                        <div class="w-full">
                            <x-form.label for="pelaksana_pemasangan" class="font-semibold py-1">Pelaksana Pemasangan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('pelaksana_pemasangan') }}"
                                type="text"
                                id="pelaksana_pemasangan"
                                name="pelaksana_pemasangan"
                                placeholder="Masukkan Pelaksana Pemasangan"
                                class="w-full {{ inputBgClass($oldOrData('pelaksana_pemasangan')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('pelaksana_pemasangan')" />
                        </div>

                        {{-- Tanggal Berlaku Sampai --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_berlaku_sampai" class="font-semibold py-1">Tanggal Berlaku Sampai</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tanggal_berlaku_sampai') }}"
                                type="date"
                                id="tanggal_berlaku_sampai"
                                name="tanggal_berlaku_sampai"
                                class="w-full {{ inputBgClass($oldOrData('tanggal_berlaku_sampai')) }}"
                                required
                            />
                            <x-form.error :messages="$errors->get('tanggal_berlaku_sampai')" />
                        </div>

                        {{-- Tanggal Input --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_input" class="font-semibold py-1">Tanggal Input</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tanggal_input') }}"
                                type="date"
                                id="tanggal_input"
                                name="tanggal_input"
                                class="w-full {{ inputBgClass($oldOrData('tanggal_input')) }}"
                            />
                            <x-form.error :messages="$errors->get('tanggal_input')" />
                        </div>

                        {{-- Status --}}
                        <div class="w-full">
                            <x-form.label for="status" class="font-semibold py-1">Status</x-form.label>
                            <select
                                id="status"
                                name="status"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 {{ $errors->has('status') ? 'border-red-500' : '' }}"
                            >
                                <option value="">Pilih Status</option>
                                <option value="active" {{ $oldOrData('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $oldOrData('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <x-form.error :messages="$errors->get('status')" />
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
