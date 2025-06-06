<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Detail Instalasi Listrik" :items="[
        ['label' => 'Instalasi Listrik', 'url' => route('instalasi-listrik.index')],
        ['label' => 'Detail Instalasi Listrik']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('instalasi-listrik.update', $instalasiListrik->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @php
                            $oldOrData = fn($field) => old($field, $instalasiListrik->$field ?? '');
                        @endphp

                        {{-- Jenis Arus --}}
                        <div class="w-full">
                            <x-form.label for="jenis_arus" class="font-semibold py-1">Jenis Arus</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jenis_arus') }}"
                                type="text"
                                id="jenis_arus"
                                name="jenis_arus"
                                placeholder="Masukkan Jenis Arus"
                                class="w-full {{ inputBgClass($oldOrData('jenis_arus')) }}"
                            />
                            <x-form.error :messages="$errors->get('jenis_arus')" />
                        </div>

                        {{-- Jumlah Daya --}}
                        <div class="w-full">
                            <x-form.label for="jumlah_daya" class="font-semibold py-1">Jumlah Daya</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jumlah_daya') }}"
                                type="text"
                                id="jumlah_daya"
                                name="jumlah_daya"
                                placeholder="Masukkan Jumlah Daya"
                                class="w-full {{ inputBgClass($oldOrData('jumlah_daya')) }}"
                            />
                            <x-form.error :messages="$errors->get('jumlah_daya')" />
                        </div>

                        {{-- Sumber Tenaga Listrik --}}
                        <div class="w-full">
                            <x-form.label for="sumber_tenaga_listrik" class="font-semibold py-1">Sumber Tenaga Listrik</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('sumber_tenaga_listrik') }}"
                                type="text"
                                id="sumber_tenaga_listrik"
                                name="sumber_tenaga_listrik"
                                placeholder="Masukkan Sumber Tenaga Listrik"
                                class="w-full {{ inputBgClass($oldOrData('sumber_tenaga_listrik')) }}"
                            />
                            <x-form.error :messages="$errors->get('sumber_tenaga_listrik')" />
                        </div>

                        {{-- No Pengusahaan --}}
                        <div class="w-full">
                            <x-form.label for="no_pengasahaan" class="font-semibold py-1">No Pengusahaan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('no_pengasahaan') }}"
                                type="text"
                                id="no_pengasahaan"
                                name="no_pengasahaan"
                                placeholder="Masukkan No Pengusahaan"
                                class="w-full {{ inputBgClass($oldOrData('no_pengasahaan')) }}"
                            />
                            <x-form.error :messages="$errors->get('no_pengasahaan')" />
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
                                <option value="">Pilih status</option>
                                <option value="active" {{ $oldOrData('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $oldOrData('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </x-form.select>
                            <x-form.error :messages="$errors->get('status')" />
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <div></div>
                        <x-button
                        href="{{ route('instalasi-listrik.edit',$instalasiListrik->id) }}"
                        variant="primary"
                        size="lg"
                        class="items-center max-w-xs gap-2"
                    >
                        <span>Update</span>
                    </x-button>
                        <x-button
                        href="{{ route('instalasi-listrik.cetak',$instalasiListrik->id) }}"
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
