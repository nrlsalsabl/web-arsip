<x-app-layout>
    <x-slot name="header">
        {{-- Header bisa ditambahkan di sini --}}
    </x-slot>

    <x-breadcrumb title="Edit Vendor Data Arsip" :items="[
        ['label' => 'Arsip', 'url' => route('vendor-archive.index')],
        ['label' => 'Edit Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form enctype="multipart/form-data" action="{{ route('vendor-archive.update', $vendorArchiveData->id) }}" method="POST" class="px-2 py-2">
                @csrf
                @method('PUT')
                @php
                    $oldData = fn($field) => old($field, $vendorArchiveData->$field ?? '');
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                    
                    {{-- No --}}
                    <div class="w-full">
                        <x-form.label for="no" class="font-semibold py-1">No</x-form.label>
                        <x-form.input value="{{ $oldData('no') }}" type="text" name="no" id="no" placeholder="Masukkan No (opsional)" class="w-full {{ inputBgClass($oldData('no')) }}" />
                        <x-form.error :messages="$errors->get('no')" />
                    </div>

                    {{-- Filling Number --}}
                    <div class="w-full">
                        <x-form.label for="filling_number" class="font-semibold py-1">Filling Number</x-form.label>
                        <x-form.input value="{{ $oldData('filling_number') }}" type="text" name="filling_number" id="filling_number" placeholder="Masukkan Filling Number" class="w-full {{ inputBgClass($oldData('filling_number')) }}" />
                        <x-form.error :messages="$errors->get('filling_number')" />
                    </div>

                    {{-- Cabinet Number --}}
                    <div class="w-full">
                        <x-form.label for="cabinet_number" class="font-semibold py-1">Cabinet Number</x-form.label>
                        <x-form.input value="{{ $oldData('cabinet_number') }}" type="text" name="cabinet_number" id="cabinet_number" placeholder="Masukkan Cabinet Number" class="w-full {{ inputBgClass($oldData('cabinet_number')) }}" />
                        <x-form.error :messages="$errors->get('cabinet_number')" />
                    </div>

                    {{-- Document Name --}}
                    <div class="w-full">
                        <x-form.label for="document_number" class="font-semibold py-1">Nama Dokumen</x-form.label>
                        <x-form.input value="{{ $oldData('document_number') }}" type="text" name="document_number" id="document_number" placeholder="Masukkan Nama Dokumen" class="w-full {{ inputBgClass($oldData('document_number')) }}" />
                        <x-form.error :messages="$errors->get('document_number')" />
                    </div>

                    {{-- Date --}}
                    <div class="w-full">
                        <x-form.label for="date" class="font-semibold py-1">Tanggal Dokumen</x-form.label>
                        <x-form.input value="{{ $oldData('date') }}" type="date" name="date" id="date" class="w-full {{ inputBgClass($oldData('date')) }}" />
                        <x-form.error :messages="$errors->get('date')" />
                    </div>

                    {{-- Company Name --}}
                    <div class="w-full">
                        <x-form.label for="company_name" class="font-semibold py-1">Company Name</x-form.label>
                        <x-form.input value="{{ $oldData('company_name') }}" type="text" name="company_name" id="company_name" placeholder="Contoh: Surat, Kontrak" class="w-full {{ inputBgClass($oldData('company_name')) }}" />
                        <x-form.error :messages="$errors->get('company_name')" />
                    </div>

                    {{-- Generate Qrcode --}}
                    <div class="w-full">
                        <x-form.label for="is_generate_qrcode" class="font-semibold py-1">Generate Qrcode</x-form.label>
                        <input type="hidden" name="is_generate_qrcode" value="0">
                        <x-form.input   type="checkbox" name="is_generate_qrcode" id="is_generate_qrcode"  class="w-5 h-7" />
                        <x-form.error :messages="$errors->get('is_generate_qrcode')" />
                    </div>

                    {{-- Document File --}}
                    <div class="w-full">
                        <x-form.label for="document_file" class="font-semibold py-1">File Dokumen</x-form.label>
                        <x-form.input type="file" name="document_file" id="document_file" class="w-full {{ inputBgClass($oldData('document_file')) }}" />
                        <x-form.error :messages="$errors->get('document_file')" />
                    </div>

                    @if (isset($vendorArchiveData->document_file))
                    <div>
                        <x-button href="{{ asset('storage/'.$vendorArchiveData->document_file) }}" variant="primary" size="lg" class="items-center max-w-xs gap-2">
                            <span>Lihat File</span>
                        </x-button>
                    </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
