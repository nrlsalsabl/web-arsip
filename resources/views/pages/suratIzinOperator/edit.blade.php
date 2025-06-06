<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Edit Sertifikat" :items="[
        ['label' => 'Data Sertifikat', 'url' => route('surat-izin-operator.index')],
        ['label' => 'Edit Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('surat-izin-operator.update', $suratIzinOperator->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    @php
                        $oldOrData = fn($field) => old($field, $suratIzinOperator->$field ?? '');
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- User ID --}}
                    <div class="w-full">
                        <x-form.label for="user_id" class="font-semibold py-1">Nama Pengguna</x-form.label>
                        <x-form.select name="user_id" id="user_id" class="w-full">
                            <option value="">Pilih Pengguna</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id || $user->id == $suratIzinOperator->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error :messages="$errors->get('user_id')" />
                    </div>

                        {{-- No Sertifikat --}}
                        <div class="w-full">
                            <x-form.label for="no_sertifikat" class="font-semibold py-1">No Sertifikat</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('no_sertifikat') }}"
                                type="text"
                                id="no_sertifikat"
                                name="no_sertifikat"
                                placeholder="Masukkan No Sertifikat"
                                class="w-full {{ inputBgClass($oldOrData('no_sertifikat')) }}"
                            />
                            <x-form.error :messages="$errors->get('no_sertifikat')" />
                        </div>

                        {{-- Jenis Sertifikat --}}
                        <div class="w-full">
                            <x-form.label for="jenis_sertifikat" class="font-semibold py-1">Jenis Sertifikat</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jenis_sertifikat') }}"
                                type="text"
                                id="jenis_sertifikat"
                                name="jenis_sertifikat"
                                placeholder="Masukkan Jenis Sertifikat"
                                class="w-full {{ inputBgClass($oldOrData('jenis_sertifikat')) }}"
                            />
                            <x-form.error :messages="$errors->get('jenis_sertifikat')" />
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
