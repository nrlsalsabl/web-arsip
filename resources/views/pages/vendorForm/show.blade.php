<x-app-layout>
    <x-slot name="header">
        {{-- Tambahkan judul atau breadcrumb jika perlu --}}
    </x-slot>

    <x-breadcrumb title="Detail Vendor" :items="[
        ['label' => 'Vendor', 'url' => route('vendor-form.index')],
        ['label' => 'Detail Data']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 sm:pb-12 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <form action="{{ route('vendor-form.update', $vendor->id) }}" method="POST" class="px-2 py-2">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ([
                        'no' => 'No',
                        'core_of_business' => 'Core of Business',
                        'full_company_name' => 'Full Company Name',
                        'npwd' => 'NPWD',
                        'postal_code' => 'Postal Code',
                        'city' => 'City',
                        'region' => 'Region',
                        'country' => 'Country',
                        'phone' => 'Phone',
                        'fax' => 'Fax',
                        'website' => 'Website',
                        'state' => 'State',
                        'trading_term' => 'Trading Term',
                        'payment_term' => 'Payment Term',
                        'contact_name' => 'Contact Name',
                        'contact_position' => 'Contact Position',
                        'email_address' => 'Email Address',
                        'mobile_number' => 'Mobile Number',
                    ] as $field => $label)
                        <div class="w-full">
                            <x-form.label for="{{ $field }}" class="font-semibold py-1">{{ $label }}</x-form.label>
                            <x-form.input
                                type="{{ $field === 'email_address' ? 'email' : 'text' }}"
                                name="{{ $field }}"
                                id="{{ $field }}"
                                value="{{ old($field, $vendor->$field) }}"
                                placeholder="Masukkan {{ $label }}"
                                class="w-full {{ inputBgClass(old($field, $vendor->$field)) }}"
                            />
                            <x-form.error :messages="$errors->get($field)" />
                        </div>
                    @endforeach

                    {{-- Address (Text Area) --}}
                    <div class="w-full md:col-span-2">
                        <x-form.label for="address" class="font-semibold py-1">Address</x-form.label>
                        <textarea
                            name="address"
                            id="address"
                            class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 w-full {{ inputBgClass(old('address', $vendor->address)) }}"
                        >{{ old('address', $vendor->address) }}</textarea>
                        <x-form.error :messages="$errors->get('address')" />
                    </div>

                    {{-- Document Expiry Date --}}
                    <div class="w-full col-span-1">
                        <x-form.label for="document_expiry_date" class="font-semibold py-1">Date Expiry Document</x-form.label>
                        <x-form.input
                            value="{{ old('document_expiry_date', $vendor->document_expiry_date) }}"
                            type="date"
                            name="document_expiry_date"
                            id="document_expiry_date"
                            class="w-full {{ inputBgClass(old('document_expiry_date', $vendor->document_expiry_date)) }}"
                        />
                        <x-form.error :messages="$errors->get('document_expiry_date')" />
                    </div>

                    {{-- Status Dropdown --}}
                    <div class="w-full md:col-span-1">
                        <x-form.label for="status" class="font-semibold py-1">Status</x-form.label>
                        <select
                            name="status"
                            id="status"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white {{ inputBgClass(old('status', $vendor->status)) }}"
                        >
                            <option value="">-- Pilih Status --</option>
                            <option value="active" {{ old('status', $vendor->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $vendor->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <x-form.error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <div></div>
                    <x-button
                    href="{{ route('vendor-form.edit',$vendor->id) }}"
                    variant="primary"
                    size="lg"
                    class="items-center max-w-xs gap-2"
                >
                    <span>Update</span>
                </x-button>
                    <x-button
                    href="{{ route('vendor-form.cetak',$vendor->id) }}"
                    variant="warning"
                    size="lg"
                    class="items-center max-w-xs gap-2"
                >
                    <span>Cetak</span>
                </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
