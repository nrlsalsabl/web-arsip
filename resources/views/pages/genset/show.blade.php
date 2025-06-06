<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Detail Data Alat" :items="[
        ['label' => 'Data Alat', 'url' => route('genset.index')],
        ['label' => 'Detail Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('genset.update', $genset->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    @php
                        $oldOrData = fn($field) => old($field, $genset->$field ?? '');
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

                        {{-- Jenis Alat --}}
                        <div class="w-full">
                            <x-form.label for="jenis_alat" class="font-semibold py-1">Jenis Alat</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jenis_alat') }}"
                                type="text"
                                id="jenis_alat"
                                name="jenis_alat"
                                placeholder="Masukkan Jenis Alat"
                                class="w-full {{ inputBgClass($oldOrData('jenis_alat')) }}"
                            />
                            <x-form.error :messages="$errors->get('jenis_alat')" />
                        </div>

                        {{-- Nama Pabrik Pembuatan --}}
                        <div class="w-full">
                            <x-form.label for="nama_pabrik_pembuatan" class="font-semibold py-1">Nama Pabrik Pembuatan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('nama_pabrik_pembuatan') }}"
                                type="text"
                                id="nama_pabrik_pembuatan"
                                name="nama_pabrik_pembuatan"
                                placeholder="Masukkan Nama Pabrik Pembuatan"
                                class="w-full {{ inputBgClass($oldOrData('nama_pabrik_pembuatan')) }}"
                            />
                            <x-form.error :messages="$errors->get('nama_pabrik_pembuatan')" />
                        </div>

                        {{-- Tempat Pembuatan --}}
                        <div class="w-full">
                            <x-form.label for="tempat_pembuatan" class="font-semibold py-1">Tempat Pembuatan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('tempat_pembuatan') }}"
                                type="text"
                                id="tempat_pembuatan"
                                name="tempat_pembuatan"
                                placeholder="Masukkan Tempat Pembuatan"
                                class="w-full {{ inputBgClass($oldOrData('tempat_pembuatan')) }}"
                            />
                            <x-form.error :messages="$errors->get('tempat_pembuatan')" />
                        </div>

                        {{-- Nomor Pabrik Pembuatan --}}
                        <div class="w-full">
                            <x-form.label for="nomor_pabrik_pembuatan" class="font-semibold py-1">Nomor Pabrik Pembuatan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('nomor_pabrik_pembuatan') }}"
                                type="text"
                                id="nomor_pabrik_pembuatan"
                                name="nomor_pabrik_pembuatan"
                                placeholder="Masukkan Nomor Pabrik Pembuatan"
                                class="w-full {{ inputBgClass($oldOrData('nomor_pabrik_pembuatan')) }}"
                            />
                            <x-form.error :messages="$errors->get('nomor_pabrik_pembuatan')" />
                        </div>

                        {{-- Daya --}}
                        <div class="w-full">
                            <x-form.label for="daya" class="font-semibold py-1">Daya</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('daya') }}"
                                type="text"
                                id="daya"
                                name="daya"
                                placeholder="Masukkan Daya"
                                class="w-full {{ inputBgClass($oldOrData('daya')) }}"
                            />
                            <x-form.error :messages="$errors->get('daya')" />
                        </div>

                        {{-- No Pengesahan --}}
                        <div class="w-full">
                            <x-form.label for="no_pengesahan" class="font-semibold py-1">No Pengesahan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('no_pengesahan') }}"
                                type="text"
                                id="no_pengesahan"
                                name="no_pengesahan"
                                placeholder="Masukkan No Pengesahan"
                                class="w-full {{ inputBgClass($oldOrData('no_pengesahan')) }}"
                            />
                            <x-form.error :messages="$errors->get('no_pengesahan')" />
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
                            <x-form.label class="font-semibold py-1" for="status">Status</x-form.label>
                            <x-form.select
                                class="w-full {{ inputBgClass($oldOrData('status')) }}"
                                name="status"
                                id="status"
                            >
                                <option value="">Pilih Status</option>
                                <option value="active" {{ $oldOrData('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $oldOrData('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </x-form.select>
                            <x-form.error :messages="$errors->get('status')" />
                        </div>

                    </div>

                    <div class="flex justify-between mt-6">
                        <div></div>
                        <x-button
                        href="{{ route('genset.edit',$genset->id) }}"
                        variant="primary"
                        size="lg"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Update</span>
                    </x-button>
                        <x-button
                        href="{{ route('genset.cetak',$genset->id) }}"
                        variant="warning"
                        size="lg"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Cetak</span>
                    </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
