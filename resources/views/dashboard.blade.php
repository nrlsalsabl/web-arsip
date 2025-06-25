<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-breadcrumb title="Dashboard" :items="[['label' => 'Home', 'url' => route('dashboard')]]" />

    <div class="bg-white rounded shadow dark:bg-gray-800"
        style="width: 350px; height: 350px; padding: 8px; display: flex; flex-direction: column;">
        <h3 class="text-sm font-semibold mb-2 text-left">Surat Izin</h3>
        <div style="flex-grow: 1; display: flex; align-items: flex-start; justify-content: left;">
            <div style="width: 100px; height: 100px;">
                <canvas id="docChart"></canvas>
            </div>
        </div>
    </div>


    <div class="mt-8 bg-white rounded shadow dark:bg-gray-800 p-4" style="width: 600px;">
        <h3 class="text-lg font-semibold mb-4">Dokumen GA Archive yang Sering Diakses</h3>
        <canvas id="barChartGaArchive"></canvas>
    </div>

    <div class="mt-8 bg-white rounded shadow dark:bg-gray-800 p-4" style="width: 600px;">
        <h3 class="text-lg font-semibold mb-4">Dokumen Vendor Archive yang Sering Diakses</h3>
        <canvas id="barChartVendorArchive"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data GA Archive
        const labelsGa = @json($topGaArchives->pluck('document_name'));
        const dataGa = @json($topGaArchives->pluck('access_count'));

        const ctxGa = document.getElementById('barChartGaArchive').getContext('2d');
        new Chart(ctxGa, {
            type: 'bar',
            data: {
                labels: labelsGa,
                datasets: [{
                    label: 'Jumlah Akses',
                    data: dataGa,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1,
                    }
                }
            }
        });

        // Data Vendor Archive
        const labelsVendor = @json($topVendorArchives->pluck('document_number'));
        const dataVendor = @json($topVendorArchives->pluck('access_count'));

        const ctxVendor = document.getElementById('barChartVendorArchive').getContext('2d');
        new Chart(ctxVendor, {
            type: 'bar',
            data: {
                labels: labelsVendor,
                datasets: [{
                    label: 'Jumlah Akses',
                    data: dataVendor,
                    backgroundColor: 'rgba(255, 159, 64, 0.7)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1,
                    }
                }
            }
        });
    </script>


    {{-- Chart.js & Plugin DataLabels --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        const ctx = document.getElementById('docChart').getContext('2d');

        const data = {
            labels: ['Expired', 'Active'],
            datasets: [{
                data: [{{ $expiredCount }}, {{ $activeCount }}],
                backgroundColor: ['#f87171', '#34d399'],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: false, 
                plugins: {
                    datalabels: {
                        color: '#fff',
                        font: {
                            size: 8,
                            weight: 'bold'
                        },
                        formatter: (value, ctx) => {
                            const total = ctx.chart._metasets[0].total;
                            return ((value / total) * 100).toFixed(1) + '%';
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        new Chart(ctx, config);
    </script>
</x-app-layout>
