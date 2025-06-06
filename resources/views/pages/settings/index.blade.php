<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
    </x-slot>

    <x-breadcrumb title="Setting" :items="[
        ['label' => 'Setting', 'url' => route('setting.index')],
        ['label' => 'Setting']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('setting.update') }}" enctype="multipart/form-data" method="POST" class="px-2 py-2">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Nama Website --}}
                    <div class="w-full">
                        <x-form.label for="site_name" class="font-semibold py-1">Nama Website</x-form.label>
                        <x-form.input value="{{ old('site_name', setting('site_name')) }}" type="text" name="site_name" id="site_name" placeholder="Masukkan nama website" class="w-full" />
                        <x-form.error :messages="$errors->get('site_name')" />
                    </div>

                    {{-- No. Telepon --}}
                    <div class="w-full">
                        <x-form.label for="phone" class="font-semibold py-1">No. Telepon</x-form.label>
                        <x-form.input value="{{ old('phone', setting('phone')) }}" type="text" name="phone" id="phone" placeholder="Masukkan no. telepon" class="w-full" />
                        <x-form.error :messages="$errors->get('phone')" />
                    </div>

                    {{-- Alamat --}}
                    <div class="w-full md:col-span-2">
                        <x-form.label for="address" class="font-semibold py-1">Alamat</x-form.label>
                        <x-form.input name="address" id="address" placeholder="Masukkan alamat" class="w-full">{{ old('address', setting('address')) }}</x-form.input>
                        <x-form.error :messages="$errors->get('address')" />
                    </div>

                    {{-- Email --}}
                    <div class="w-full">
                        <x-form.label for="email" class="font-semibold py-1">Email</x-form.label>
                        <x-form.input value="{{ old('email', setting('email')) }}" type="email" name="email" id="email" placeholder="Masukkan email" class="w-full" />
                        <x-form.error :messages="$errors->get('email')" />
                    </div>

                    {{-- Website --}}
                    <div class="w-full">
                        <x-form.label for="website" class="font-semibold py-1">Website</x-form.label>
                        <x-form.input value="{{ old('website', setting('website')) }}" type="text" name="website" id="website" placeholder="Masukkan URL website" class="w-full" />
                        <x-form.error :messages="$errors->get('website')" />
                    </div>

                    {{-- Logo --}}
                    <div class="w-full">
                        <x-form.label for="logo" class="font-semibold py-1">Logo</x-form.label>
                        <x-form.input type="file" name="logo" id="logo" class="w-full" />
                        @if (setting('logo'))
                            <img src="{{ asset('storage/' . setting('logo')) }}" alt="Logo" class="w-24 mt-2 rounded">
                        @endif
                        <x-form.error :messages="$errors->get('logo')" />
                    </div>

                    {{-- Favicon --}}
                    <div class="w-full">
                        <x-form.label for="favicon" class="font-semibold py-1">Favicon</x-form.label>
                        <x-form.input type="file" name="favicon" id="favicon" class="w-full" />
                        @if (setting('favicon'))
                            <img src="{{ asset('storage/' . setting('favicon')) }}" alt="Favicon" class="w-10 mt-2 rounded">
                        @endif
                        <x-form.error :messages="$errors->get('favicon')" />
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
