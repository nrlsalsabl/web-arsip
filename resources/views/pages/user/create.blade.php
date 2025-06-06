<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Tambah User" :items="[
        ['label' => 'Genset', 'url' => route('user.index')],
        ['label' => 'Tambah Use']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('user.store') }}" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- name --}}
                    <div class="w-full">
                        <x-form.label for="name" class="font-semibold py-1">Nama</x-form.label>
                        <x-form.input value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Masukkan name" class="w-full" />
                        <x-form.error :messages="$errors->get('name')" />
                    </div>

                    
                    {{-- name --}}
                    <div class="w-full">
                        <x-form.label for="nik" class="font-semibold py-1">NIK</x-form.label>
                        <x-form.input value="{{ old('nik') }}" type="text" name="nik" id="nik" placeholder="Masukkan nik" class="w-full" />
                        <x-form.error :messages="$errors->get('nik')" />
                    </div>


                      {{-- email --}}
                      <div class="w-full">
                        <x-form.label for="email" class="font-semibold py-1">Email</x-form.label>
                        <x-form.input value="{{ old('email') }}" type="text" name="email" id="email" placeholder="Masukkan email" class="w-full" />
                        <x-form.error :messages="$errors->get('email')" />
                    </div>

                    
                    {{-- password --}}
                    <div class="w-full">
                        <x-form.label for="password" class="font-semibold py-1">Nama</x-form.label>
                        <x-form.input value="{{ old('password') }}" type="password" name="password" id="password" placeholder="Masukkan password" class="w-full" />
                        <x-form.error :messages="$errors->get('password')" />
                    </div>


                    
                    {{--  Jabatan --}}
                    <div class="w-full">
                        <x-form.label for="jabatan" class="font-semibold py-1">Jabatan</x-form.label>
                        <x-form.input value="{{ old('jabatan') }}" type="text" name="jabatan" id="jabatan" placeholder="Masukkan jabatan" class="w-full" />
                        <x-form.error :messages="$errors->get('jabatan')" />
                    </div>


                    
                    {{-- departemen --}}
                    <div class="w-full">
                        <x-form.label for="departemen" class="font-semibold py-1">Nama</x-form.label>
                        <x-form.input value="{{ old('departemen') }}" type="text" name="departemen" id="departemen" placeholder="Masukkan departemen" class="w-full" />
                        <x-form.error :messages="$errors->get('departemen')" />
                    </div>

                    {{-- Status --}}
                    <div class="w-full">
                        <x-form.label for="role" class="font-semibold py-1">Role</x-form.label>
                        <x-form.select name="role" id="role" class="w-full">
                            <option value="">Pilih Hak Ases</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="manajer" {{ old('role') == 'manajer' ? 'selected' : '' }}>Manajer</option>
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
