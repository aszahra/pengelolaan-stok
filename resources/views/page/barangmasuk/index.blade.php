<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                Daftar Barang Masuk
                            </div>
                            <div>
                                <a href="{{ route('barangmasuk.create') }}"
                                    class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            SUPPLIER
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL PEMBELIAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = $data->firstItem();
                                    @endphp
                                    @foreach ($data as $f)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $f->supplier->nama_supplier }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->tgl_pembelian }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                @php
                                                    $detailBarang = $f->detailbarangmasuk->map(function ($d) {
                                                        return [
                                                            'nama_barang' =>
                                                                $d->barang->nama_barang ?? 'Tidak diketahui',
                                                            'jumlah' => $d->jumlah,
                                                            'satuan' => $d->satuan,
                                                        ];
                                                    });
                                                @endphp
                                                <button
                                                    class="bg-green-400 p-2 w-20 h-10 rounded-xl text-white hover:bg-green-500 detailBtn"
                                                    data-supplier="{{ $f->supplier->nama_supplier }}"
                                                    data-tanggal="{{ $f->tgl_pembelian }}"
                                                    data-detail='@json($detailBarang)'>
                                                    Detail
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="detailModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
        <div class="fixed inset-0 bg-black opacity-50" onclick="closeModal()"></div>

        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl relative z-50">
                <div class="p-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-bold">Detail Barang Masuk</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-red-600">&times;</button>
                </div>
                <div class="p-4">
                    <p><strong>Supplier:</strong> <span id="modalSupplier"></span></p>
                    <p><strong>Tanggal Pembelian:</strong> <span id="modalTanggal"></span></p>
                    <div class="mt-4">
                        <strong>Detail Barang:</strong>
                        <ul id="modalDetailList" class="list-disc list-inside mt-2 text-sm text-gray-700">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function closeModal() {
            $('#detailModal').addClass('hidden');
        }

        $(document).ready(function() {
            $('.detailBtn').click(function() {
                const supplier = $(this).data('supplier');
                const tanggal = $(this).data('tanggal');
                const details = $(this).data('detail');

                $('#modalSupplier').text(supplier);
                $('#modalTanggal').text(tanggal);

                let detailHtml = '';
                if (details && details.length > 0) {
                    details.forEach(item => {
                        detailHtml +=
                            `<li>${item.nama_barang ?? 'Barang'} - ${item.jumlah} ${item.satuan}</li>`;
                    });
                } else {
                    detailHtml = '<li>Tidak ada data detail barang.</li>';
                }

                $('#modalDetailList').html(detailHtml);
                $('#detailModal').removeClass('hidden');
            });
        });
    </script>

</x-app-layout>
