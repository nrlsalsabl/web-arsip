<x-app-layout>
    <x-slot name="header">
        {{-- Header bisa ditambahkan di sini --}}
    </x-slot>

    <x-breadcrumb title="Update Data Arsip" :items="[
        ['label' => 'Arsip', 'url' => route('ga-archive.index')],
        ['label' => 'Update Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form enctype="multipart/form-data" action="{{ route('ga-archive.update',$gaArchiveData->id) }}" method="POST" class="px-2 py-2">
                @csrf
                @method('PUT')
                @php
                    $oldOrData = fn($field) => old($field, $gaArchiveData->$field ?? '');
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                    
                    {{-- No --}}
                    <div class="w-full">
                        <x-form.label for="no" class="font-semibold py-1">No</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('no') }}" 
                            type="text" name="no" id="no" placeholder="Masukkan No (opsional)" 
                            class="w-full {{ inputBgClass($oldOrData('no')) }}" />
                        <x-form.error :messages="$errors->get('no')" />
                    </div>

                    {{-- Filling Number --}}
                    <div class="w-full">
                        <x-form.label for="filling_number" class="font-semibold py-1">Filling Number</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('filling_number') }}" 
                            type="text" name="filling_number" id="filling_number" 
                            placeholder="Masukkan Filling Number" 
                            class="w-full {{ inputBgClass($oldOrData('filling_number')) }}" />
                        <x-form.error :messages="$errors->get('filling_number')" />
                    </div>

                    {{-- Cabinet Number --}}
                    <div class="w-full">
                        <x-form.label for="cabinet_number" class="font-semibold py-1">Cabinet Number</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('cabinet_number') }}" 
                            type="text" name="cabinet_number" id="cabinet_number" 
                            placeholder="Masukkan Cabinet Number" 
                            class="w-full {{ inputBgClass($oldOrData('cabinet_number')) }}" />
                        <x-form.error :messages="$errors->get('cabinet_number')" />
                    </div>

                    {{-- Document Name --}}
                    <div class="w-full">
                        <x-form.label for="document_name" class="font-semibold py-1">Nama Dokumen</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('document_name') }}" 
                            type="text" name="document_name" id="document_name" 
                            placeholder="Masukkan Nama Dokumen" 
                            class="w-full {{ inputBgClass($oldOrData('document_name')) }}" />
                        <x-form.error :messages="$errors->get('document_name')" />
                    </div>

                    {{-- Date --}}
                    <div class="w-full">
                        <x-form.label for="date" class="font-semibold py-1">Tanggal Dokumen</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('date') }}" 
                            type="date" name="date" id="date" 
                            class="w-full {{ inputBgClass($oldOrData('date')) }}" />
                        <x-form.error :messages="$errors->get('date')" />
                    </div>

                    {{-- Category --}}
                    <div class="w-full">
                        <x-form.label for="category" class="font-semibold py-1">Kategori</x-form.label>
                        <x-form.input 
                            value="{{ $oldOrData('category') }}" 
                            type="text" name="category" id="category" 
                            placeholder="Contoh: Surat, Kontrak" 
                            class="w-full {{ inputBgClass($oldOrData('category')) }}" />
                        <x-form.error :messages="$errors->get('category')" />
                    </div>

                    {{-- Generate QR Code --}}
                    <div class="w-full">
                        <x-form.label for="is_generate_qrcode" class="font-semibold py-1">Generate QR Code</x-form.label>
                        <input type="hidden" name="is_generate_qrcode" value="0">
                        <input 
                            type="checkbox" name="is_generate_qrcode" id="is_generate_qrcode" 
                            value="1" 
                            class="w-5 h-7" 
                            {{ old('is_generate_qrcode', $gaArchiveData->is_generate_qrcode ?? false) ? 'checked' : '' }} />
                        <x-form.error :messages="$errors->get('is_generate_qrcode')" />
                    </div>

                    {{-- Document File --}}
                    <div class="w-full">
                        <x-form.label for="document_file" class="font-semibold py-1">File Dokumen</x-form.label>
                        <x-form.input 
                            type="file" name="document_file" id="document_file" 
                            class="w-full {{ inputBgClass('') }}" />
                        <x-form.error :messages="$errors->get('document_file')" />
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
