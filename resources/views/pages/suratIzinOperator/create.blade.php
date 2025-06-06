<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah Surat Izin Operator" :items="[
        ['label' => 'Surat Izin Operator', 'url' => route('surat-izin-operator.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('surat-izin-operator.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- User ID --}}
                    <div class="w-full">
                        <x-form.label for="user_id" class="font-semibold py-1">Nama Pengguna</x-form.label>
                        <x-form.select name="user_id" id="user_id" class="w-full">
                            <option value="">Pilih Pengguna</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error :messages="$errors->get('user_id')" />
                    </div>

                    {{-- No Sertifikat --}}
                    <div class="w-full">
                        <x-form.label for="no_sertifikat" class="font-semibold py-1">Nomor Sertifikat</x-form.label>
                        <x-form.input value="{{ old('no_sertifikat') }}" type="text" name="no_sertifikat" id="no_sertifikat" placeholder="Masukkan Nomor Sertifikat" class="w-full" />
                        <x-form.error :messages="$errors->get('no_sertifikat')" />
                    </div>

                    {{-- Jenis Sertifikat --}}
                    <div class="w-full">
                        <x-form.label for="jenis_sertifikat" class="font-semibold py-1">Jenis Sertifikat</x-form.label>
                        <x-form.input value="{{ old('jenis_sertifikat') }}" type="text" name="jenis_sertifikat" id="jenis_sertifikat" placeholder="Masukkan Jenis Sertifikat" class="w-full" />
                        <x-form.error :messages="$errors->get('jenis_sertifikat')" />
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
