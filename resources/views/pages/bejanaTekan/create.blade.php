<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2> --}}
    </x-slot>
    <x-breadcrumb title="Tambah Bejana Tekan" :items="[
    ['label' => 'Bejana Tekan', 'url' => route('bejana-tekan.index')],
    ['label' => 'Tambah Bejana Tekan']
]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <div>
                    {{-- <h1 class="text-2xl font-bold">Bejana Tekan</h1> --}}
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <form action="{{ route('bejana-tekan.store') }}" method="POST" class="px-2 py-2">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Kode --}}
                        <div class="w-full">
                            <x-form.label for="kode" class="font-semibold py-1">Kode</x-form.label>
                            <x-form.input value="{{ old('kode') }}" type="text" id="kode" name="kode" placeholder="Masukkan Kode" class="w-full" />
                            <x-form.error :messages="$errors->get('kode')" />
                        </div>
                
                        {{-- Jenis Pesawat --}}
                        <div class="w-full">
                            <x-form.label for="jenis_pesawat" class="font-semibold py-1">Jenis Pesawat</x-form.label>
                            <x-form.input value="{{ old('jenis_pesawat') }}" type="text" id="jenis_pesawat" name="jenis_pesawat" placeholder="Masukkan Jenis Pesawat" class="w-full" />
                            <x-form.error :messages="$errors->get('jenis_pesawat')" />
                        </div>
                
                        {{-- Tempat Pembuatan --}}
                        <div class="w-full">
                            <x-form.label for="tempat_pembuatan" class="font-semibold py-1">Tempat Pembuatan</x-form.label>
                            <x-form.input value="{{ old('tempat_pembuatan') }}" type="text" id="tempat_pembuatan" name="tempat_pembuatan" placeholder="Masukkan Tempat Pembuatan" class="w-full" />
                            <x-form.error :messages="$errors->get('tempat_pembuatan')" />
                        </div>
                
                        {{-- No Seri --}}
                        <div class="w-full">
                            <x-form.label for="no_seri" class="font-semibold py-1">No Seri</x-form.label>
                            <x-form.input value="{{ old('no_seri') }}" type="text" id="no_seri" name="no_seri" placeholder="Masukkan No Seri" class="w-full" />
                            <x-form.error :messages="$errors->get('no_seri')" />
                        </div>
                
                        {{-- Bentuk Bejana --}}
                        <div class="w-full">
                            <x-form.label for="bentuk_bejana" class="font-semibold py-1">Bentuk Bejana</x-form.label>
                            <x-form.input value="{{ old('bentuk_bejana') }}" type="text" id="bentuk_bejana" name="bentuk_bejana" placeholder="Masukkan Bentuk Bejana" class="w-full" />
                            <x-form.error :messages="$errors->get('bentuk_bejana')" />
                        </div>
                
                        {{-- Tekanan Kerja --}}
                        <div class="w-full">
                            <x-form.label for="tekanan_kerja" class="font-semibold py-1">Tekanan Kerja</x-form.label>
                            <x-form.input value="{{ old('tekanan_kerja') }}" type="text" id="tekanan_kerja" name="tekanan_kerja" placeholder="Masukkan Tekanan Kerja" class="w-full" />
                            <x-form.error :messages="$errors->get('tekanan_kerja')" />
                        </div>
                
                        {{-- Volume --}}
                        <div class="w-full">
                            <x-form.label for="volume" class="font-semibold py-1">Volume</x-form.label>
                            <x-form.input value="{{ old('volume') }}" type="text" id="volume" name="volume" placeholder="Masukkan Volume" class="w-full" />
                            <x-form.error :messages="$errors->get('volume')" />
                        </div>
                
                        {{-- Bahan Diisi --}}
                        <div class="w-full">
                            <x-form.label for="bahan_diisi" class="font-semibold py-1">Bahan Diisi</x-form.label>
                            <x-form.input value="{{ old('bahan_diisi') }}" type="text" id="bahan_diisi" name="bahan_diisi" placeholder="Masukkan Bahan Diisi" class="w-full" />
                            <x-form.error :messages="$errors->get('bahan_diisi')" />
                        </div>
                
                        {{-- No Izin Pemakaian --}}
                        <div class="w-full">
                            <x-form.label for="no_izin_pemakaian" class="font-semibold py-1">No Izin Pemakaian</x-form.label>
                            <x-form.input value="{{ old('no_izin_pemakaian') }}" type="text" id="no_izin_pemakaian" name="no_izin_pemakaian" placeholder="Masukkan No Izin Pemakaian" class="w-full" />
                            <x-form.error :messages="$errors->get('no_izin_pemakaian')" />
                        </div>
                
                        {{-- Tanggal Berlaku --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_berlaku" class="font-semibold py-1">Tanggal Berlaku</x-form.label>
                            <x-form.input value="{{ old('tanggal_berlaku') }}" type="date" id="tanggal_berlaku" name="tanggal_berlaku" class="w-full" />
                            <x-form.error :messages="$errors->get('tanggal_berlaku')" />
                        </div>
                
                        {{-- Tanggal Input --}}
                        <div class="w-full">
                            <x-form.label for="tanggal_input" class="font-semibold py-1">Tanggal Input</x-form.label>
                            <x-form.input value="{{ old('tanggal_input') }}" type="date" id="tanggal_input" name="tanggal_input" class="w-full" />
                            <x-form.error :messages="$errors->get('tanggal_input')" />
                        </div>

                        {{-- Tanggal Input --}}
                        <div class="w-full">
                            <x-form.label class="font-semibold py-1" for="status">Status</x-form.label>
                            <x-form.select class="w-full" name="status" id="status">
                                <option value="">Pilih status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
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
                <span>Simpan</span>
            </x-button>
                    </div>
                </form>
                
                
            </div>
            

        </div>
    </div>
</x-app-layout>
