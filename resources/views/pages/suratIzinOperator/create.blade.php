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

                    {{-- NIK --}}
                    <div class="w-full">
                        <x-form.label for="nik" class="font-semibold py-1">NIK</x-form.label>
                        <x-form.input
                            type="text"
                            name="nik"
                            id="nik"
                            value="{{ old('nik') }}"
                            placeholder="Masukkan NIK"
                            class="w-full"
                        />
                        <x-form.error :messages="$errors->get('nik')" />
                    </div>

                    {{-- Hidden user_id --}}
                    <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id') }}" />

                    {{-- Nama --}}
                    <div class="w-full">
                        <x-form.label for="nama" class="font-semibold py-1">Nama</x-form.label>
                        <x-form.input
                            type="text"
                            id="nama"
                            name="nama"
                            readonly
                            class="w-full bg-gray-100 text-gray-700"
                        />
                    </div>

                    {{-- Jabatan --}}
                    <div class="w-full">
                        <x-form.label for="jabatan" class="font-semibold py-1">Jabatan</x-form.label>
                        <x-form.input
                            type="text"
                            id="jabatan"
                            name="jabatan"
                            readonly
                            class="w-full bg-gray-100 text-gray-700"
                        />
                    </div>

                    {{-- Departemen --}}
                    <div class="w-full">
                        <x-form.label for="departemen" class="font-semibold py-1">Departemen</x-form.label>
                        <x-form.input
                            type="text"
                            id="departemen"
                            name="departemen"
                            readonly
                            class="w-full bg-gray-100 text-gray-700"
                        />
                    </div>

                    {{-- No Sertifikat --}}
                    <div class="w-full">
                        <x-form.label for="no_sertifikat" class="font-semibold py-1">Nomor Sertifikat</x-form.label>
                        <x-form.input
                            type="text"
                            name="no_sertifikat"
                            id="no_sertifikat"
                            value="{{ old('no_sertifikat') }}"
                            placeholder="Masukkan Nomor Sertifikat"
                            class="w-full"
                        />
                        <x-form.error :messages="$errors->get('no_sertifikat')" />
                    </div>

                    {{-- Jenis Sertifikat --}}
                    <div class="w-full">
                        <x-form.label for="jenis_sertifikat" class="font-semibold py-1">Jenis Sertifikat</x-form.label>
                        <x-form.input
                            type="text"
                            name="jenis_sertifikat"
                            id="jenis_sertifikat"
                            value="{{ old('jenis_sertifikat') }}"
                            placeholder="Masukkan Jenis Sertifikat"
                            class="w-full"
                        />
                        <x-form.error :messages="$errors->get('jenis_sertifikat')" />
                    </div>

                    {{-- Tanggal Berlaku --}}
                    <div class="w-full">
                        <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                        <x-form.input
                            type="date"
                            name="tanggal_berlaku"
                            id="tanggal_berlaku"
                            value="{{ old('tanggal_berlaku') }}"
                            class="w-full"
                        />
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Data users dari backend ke JS
            const users = @json($users);

            const nikInput = document.getElementById('nik');
            const userIdInput = document.getElementById('user_id');
            const namaInput = document.getElementById('nama');
            const jabatanInput = document.getElementById('jabatan');
            const departemenInput = document.getElementById('departemen');

            nikInput.addEventListener('blur', function () {
                const nik = this.value.trim();
                const user = users.find(u => u.nik === nik);

                if (user) {
                    userIdInput.value = user.id;    
                    namaInput.value = user.name || '';
                    jabatanInput.value = user.jabatan || '';
                    departemenInput.value = user.departemen || '';
                } else {
                    userIdInput.value = '';
                    namaInput.value = '';
                    jabatanInput.value = '';
                    departemenInput.value = '';
                    alert('User dengan NIK tersebut tidak ditemukan!');
                }
            });
        });
    </script>
</x-app-layout>
