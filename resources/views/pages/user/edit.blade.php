<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Edit Data Pengguna" :items="[
        ['label' => 'Data Pengguna', 'url' => route('user.index')],
        ['label' => 'Edit Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="px-2 py-2">
                    @csrf
                    @method('PUT')

                    @php
                        $oldOrData = fn($field) => old($field, $user->$field ?? '');
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Nama --}}
                        <div class="w-full">
                            <x-form.label for="name" class="font-semibold py-1">Nama</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('name') }}"
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Masukkan Nama"
                                class="w-full {{ inputBgClass($oldOrData('name')) }}"
                            />
                            <x-form.error :messages="$errors->get('name')" />
                        </div>

                        {{-- NIK --}}
                        <div class="w-full">
                            <x-form.label for="nik" class="font-semibold py-1">NIK</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('nik') }}"
                                type="text"
                                id="nik"
                                name="nik"
                                placeholder="Masukkan NIK"
                                class="w-full {{ inputBgClass($oldOrData('nik')) }}"
                            />
                            <x-form.error :messages="$errors->get('nik')" />
                        </div>

                        {{-- Email --}}
                        <div class="w-full">
                            <x-form.label for="email" class="font-semibold py-1">Email</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('email') }}"
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan Email"
                                class="w-full {{ inputBgClass($oldOrData('email')) }}"
                            />
                            <x-form.error :messages="$errors->get('email')" />
                        </div>

                        {{-- Jabatan --}}
                        <div class="w-full">
                            <x-form.label for="jabatan" class="font-semibold py-1">Jabatan</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('jabatan') }}"
                                type="text"
                                id="jabatan"
                                name="jabatan"
                                placeholder="Masukkan Jabatan"
                                class="w-full {{ inputBgClass($oldOrData('jabatan')) }}"
                            />
                            <x-form.error :messages="$errors->get('jabatan')" />
                        </div>

                        {{-- Departemen --}}
                        <div class="w-full">
                            <x-form.label for="departemen" class="font-semibold py-1">Departemen</x-form.label>
                            <x-form.input
                                value="{{ $oldOrData('departemen') }}"
                                type="text"
                                id="departemen"
                                name="departemen"
                                placeholder="Masukkan Departemen"
                                class="w-full {{ inputBgClass($oldOrData('departemen')) }}"
                            />
                            <x-form.error :messages="$errors->get('departemen')" />
                        </div>

                        {{-- Role --}}
                        <div class="w-full">
                            <x-form.label for="role" class="font-semibold py-1">Role</x-form.label>
                            <x-form.select
                                id="role"
                                name="role"
                                class="w-full {{ inputBgClass($oldOrData('role')) }}"
                            >
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ $oldOrData('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $oldOrData('role') == 'user' ? 'selected' : '' }}>User</option>
                                <!-- Tambahkan opsi lain jika ada -->
                            </x-form.select>
                            <x-form.error :messages="$errors->get('role')" />
                        </div>

                        {{-- Status --}}
                        <div class="w-full">
                            <x-form.label for="status" class="font-semibold py-1">Status</x-form.label>
                            <x-form.select
                                id="status"
                                name="status"
                                class="w-full {{ inputBgClass($oldOrData('status')) }}"
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
