<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Form Peminjaman Arsip</h2>
    </x-slot>

    <x-breadcrumb title="Tambah Peminjaman Arsip" :items="[
        ['label' => 'Peminjaman Arsip', 'url' => route('archive-loan.index')],
        ['label' => 'Tambah Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('archive-loan.store') }}" method="POST" class="px-2 py-2">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Peminjam --}}
                    <div class="w-full">
                        <x-form.label for="user_id" class="font-semibold py-1">Peminjam</x-form.label>
                        <select name="user_id" id="user_id" class="form-select w-full">
                            <option value="">-- Pilih Peminjam --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" 
                                        data-department="{{ $user->departemen ?? '-' }}"
                                        {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-form.error :messages="$errors->get('user_id')" />
                    </div>

                    {{-- Department (Auto-filled) --}}
                    <div class="w-full">
                        <x-form.label for="department" class="font-semibold py-1">Departemen</x-form.label>
                        <x-form.input value="{{ old('department') }}" type="text" name="department" id="department" class="w-full bg-gray-100" readonly />
                        <small class="text-gray-500">Departemen akan terisi otomatis setelah memilih peminjam</small>
                    </div>

                    {{-- Jenis Arsip --}}
                    <div class="w-full">
                        <x-form.label for="archive_type" class="font-semibold py-1">Jenis Arsip</x-form.label>
                        <select name="archive_type" id="archive_type" class="form-select w-full">
                            <option value="">-- Pilih Jenis Arsip --</option>
                            <option value="ga" {{ old('archive_type') === 'ga' ? 'selected' : '' }}>GA Archive</option>
                            <option value="vendor" {{ old('archive_type') === 'vendor' ? 'selected' : '' }}>Vendor Archive</option>
                        </select>
                        <x-form.error :messages="$errors->get('archive_type')" />
                    </div>

                    {{-- Placeholder untuk balance layout --}}
                    <div class="w-full"></div>

                    {{-- Arsip GA --}}
                    <div class="w-full md:col-span-2" id="archive_ga" style="display:none">
                        <x-form.label for="archive_id_ga" class="font-semibold py-1">Pilih GA Archive</x-form.label>
                        <select name="archive_id_ga" class="form-select w-full">
                            @foreach($gaArchives as $archive)
                                <option value="{{ $archive->id }}" {{ old('archive_id') == $archive->id && old('archive_type') === 'ga' ? 'selected' : '' }}>
                                    {{ $archive->document_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Arsip Vendor --}}
                    <div class="w-full md:col-span-2" id="archive_vendor" style="display:none">
                        <x-form.label for="archive_id_vendor" class="font-semibold py-1">Pilih Vendor Archive</x-form.label>
                        <select name="archive_id_vendor" class="form-select w-full">
                            @foreach($vendorArchives as $archive)
                                <option value="{{ $archive->id }}" {{ old('archive_id') == $archive->id && old('archive_type') === 'vendor' ? 'selected' : '' }}>
                                    {{ $archive->document_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="archive_id" id="archive_id_real" value="{{ old('archive_id') }}">

                    {{-- Tanggal Pinjam --}}
                    <div class="w-full">
                        <x-form.label for="loan_date" class="font-semibold py-1">Tanggal Pinjam</x-form.label>
                        <x-form.input value="{{ old('loan_date') }}" type="date" name="loan_date" id="loan_date" class="w-full" />
                        <x-form.error :messages="$errors->get('loan_date')" />
                    </div>

                    {{-- Tanggal Kembali --}}
                    <div class="w-full">
                        <x-form.label for="return_date" class="font-semibold py-1">Tanggal Kembali</x-form.label>
                        <x-form.input value="{{ old('return_date') }}" type="date" name="return_date" id="return_date" class="w-full" />
                        <x-form.error :messages="$errors->get('return_date')" />
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
            const userSelector = document.getElementById('user_id');
            const departmentInput = document.getElementById('department');
            const typeSelector = document.getElementById('archive_type');
            const gaDiv = document.getElementById('archive_ga');
            const vendorDiv = document.getElementById('archive_vendor');
            const archiveIdReal = document.getElementById('archive_id_real');

            // Update department when user is selected
            userSelector.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const department = selectedOption.getAttribute('data-department') || '-';
                departmentInput.value = department;
            });

            // Set initial department if user is already selected (for old values)
            if (userSelector.value) {
                const selectedOption = userSelector.options[userSelector.selectedIndex];
                const department = selectedOption.getAttribute('data-department') || '-';
                departmentInput.value = department;
            }

            const updateArchiveId = () => {
                if (typeSelector.value === 'ga') {
                    const selected = document.querySelector('[name="archive_id_ga"]').value;
                    archiveIdReal.value = selected;
                } else if (typeSelector.value === 'vendor') {
                    const selected = document.querySelector('[name="archive_id_vendor"]').value;
                    archiveIdReal.value = selected;
                }
            };

            typeSelector.addEventListener('change', function () {
                gaDiv.style.display = this.value === 'ga' ? 'block' : 'none';
                vendorDiv.style.display = this.value === 'vendor' ? 'block' : 'none';
                updateArchiveId();
            });

            document.querySelector('[name="archive_id_ga"]').addEventListener('change', updateArchiveId);
            document.querySelector('[name="archive_id_vendor"]').addEventListener('change', updateArchiveId);

            // Set initial state (on page load)
            if (typeSelector.value === 'ga') {
                gaDiv.style.display = 'block';
                updateArchiveId();
            } else if (typeSelector.value === 'vendor') {
                vendorDiv.style.display = 'block';
                updateArchiveId();
            }
        });
    </script>
</x-app-layout>