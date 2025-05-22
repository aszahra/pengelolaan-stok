<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Stok Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Ringkasan Stok -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Barang Masuk</h3>
                    <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">150</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Barang Keluar</h3>
                    <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">90</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Stok Tersisa</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">60</p>
                </div>
            </div>

            <!-- Chart Stok Barang -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-700 dark:text-gray-300">Grafik Stok Barang (Dummy)</h3>
                <canvas id="stokChart" height="150"></canvas>
            </div>

            <!-- Tabel Barang Masuk Terbaru (Dummy) -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-700 dark:text-gray-300">Barang Masuk Terbaru</h3>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">21-05-2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Beras</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">50</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">20-05-2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Mie Goreng</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">30</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">19-05-2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Gula</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">70</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('stokChart').getContext('2d');
        const stokChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Beras', 'Mie Goreng', 'Gula', 'Minyak Goreng', 'Sabun Cuci'],
                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: [50, 30, 70, 40, 60],
                        backgroundColor: 'rgba(34,197,94, 0.7)' // hijau
                    },
                    {
                        label: 'Barang Keluar',
                        data: [20, 10, 30, 15, 25],
                        backgroundColor: 'rgba(239,68,68, 0.7)' // merah
                    },
                    {
                        label: 'Stok Tersisa',
                        data: [30, 20, 40, 25, 35],
                        backgroundColor: 'rgba(59,130,246, 0.7)' // biru
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
