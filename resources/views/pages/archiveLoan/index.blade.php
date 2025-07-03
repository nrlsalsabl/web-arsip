<x-app-layout>
    <x-slot name="header"></x-slot>

    <x-breadcrumb title="Peminjaman Arsip" :items="[
        ['label' => 'Archive Data', 'url' => route('dashboard')],
        ['label' => 'Peminjaman Arsip']
    ]" />

    <div class="space-y-6">
        <div class="p-0 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="flex justify-between mb-4">
                <div></div>
                <x-button href="{{ route('archive-loan.create') }}" variant="primary" size="base"
                    class="items-center max-w-xs gap-2">
                    <span>+ Tambah</span>
                </x-button>
            </div>

            <div class="relative overflow-x-auto">
                <table id="archive-loan-table" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Peminjam</th>
                            <th class="px-6 py-3">Departemen</th>
                            <th class="px-6 py-3">Jenis Arsip</th>
                            <th class="px-6 py-3">Nama Dokumen</th>
                            <th class="px-6 py-3">Tanggal Pinjam</th>
                            <th class="px-6 py-3">Tanggal Kembali</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($archiveLoans as $loan)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $loan->user->name }}</td>
                                <td class="px-6 py-4">{{ $loan->department }}</td>
                                <td class="px-6 py-4 text-capitalize">{{ $loan->archive_type }}</td>
                                <td class="px-6 py-4">{{ $loan->document_name }}</td>
                                <td class="px-6 py-4">{{ $loan->loan_date }}</td>
                                <td class="px-6 py-4">{{ $loan->return_date ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-1">
                                        <x-button href="{{ route('archive-loan.edit', $loan->id) }}" variant="warning" size="sm"
                                            class="items-center w-max p-0 gap-2">
                                            <i class="fa-solid fa-edit"></i>
                                        </x-button>
                                        <form action="{{ route('archive-loan.destroy', $loan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-button type="submit" variant="danger" size="sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="items-center w-max p-0 gap-2">
                                                <i class="fa-solid fa-trash"></i>
                                            </x-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@push('scripts')
<script>
    $(document).ready(function () {
        // Disable DataTables warnings
        $.fn.dataTable.ext.errMode = 'none';
        
        try {
            $('#archive-loan-table').DataTable({
                paging: true,
                searching: true,
                info: true,
                lengthChange: true,
                language: {
                    emptyTable: "Tidak ada data peminjaman",
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir", 
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        } catch (e) {
            console.log('DataTables initialization failed:', e);
        }
    });
</script>
@endpush