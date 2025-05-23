<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="text-center w-full font-bold mb-9">
                            Form Input Barang Keluar
                        </div>
                    </div>
                    <div>
                        @if ($errors->has('stok'))
                            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                                {{ $errors->first('stok') }}
                            </div>
                        @endif
                        <form class="w-full mx-auto" method="POST" action="{{ route('barangkeluar.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="kd_konsumen"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="kd_konsumen" placeholder="Pilih Konsumen" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($konsumen as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_konsumen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Keluar</label>
                                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            {{-- <div class="mb-5 w-full">
                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <input name="keterangan" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan keterangan...">
                            </div> --}}
                            <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                                <div class="flex items-center justify-between">
                                    <div class="flex">
                                        Detail Barang Keluar
                                    </div>
                                    <button type="button" id="addRowBtn"
                                        class="bg-sky-400 hover:bg-sky-500 text-white p-2 rounded-xl">Tambah
                                        Barang</button>
                                </div>
                            </div>
                            <div id="produkContainer"></div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                    {{-- =================== --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- ${barangList.map(barang =>
                                `<option value="${barang.id}" data-stok="${barang.stok}" data-satuan="${barang.satuan}">${barang.nama_barang}</option>`
                            ).join('')} --}}
    <script>
        let rowCount = 0;

        const barangList = @json($barang->toArray() ?? []);

        console.log("Data barang:", barangList);

        function addRow() {
            rowCount++;
            const row = `
            <div class="border border-2 rounded-xl p-3 mb-3" id="row${rowCount}">
                <div class="flex items-center gap-4">
                    <div class="mb-5 w-full">
                        <label class="block text-sm font-medium">Nama Barang</label>
                        <select name="kd_barang[]" id="barang${rowCount}" class="barang-dropdown w-full p-2 rounded border" required>
                            <option value="" disabled selected>Pilih Barang</option>
                            ${barangList.filter(barang => barang.stok > 0).map(barang =>
        `<option value="${barang.id}" data-stok="${barang.stok}" data-satuan="${barang.satuan}">${barang.nama_barang}</option>`
    ).join('')}

                        </select>
                    </div>
                    <div class="mb-5 w-full">
                        <label class="block text-sm font-medium">Jumlah</label>
                        <input type="number" name="jumlah[]" class="w-full p-2 rounded border" required min="1" required/>
                    </div>
                    <div class="mb-5 w-full">
                        <label class="block text-sm font-medium">Satuan</label>
                        <input type="text" name="satuan[]" id="satuan${rowCount}" readonly class="w-full p-2 rounded border bg-gray-100" required />
                    </div>
                    <div class="mb-5 w-full">
                        <label class="block text-sm font-medium">Stok</label>
                        <input type="number" name="stok[]" id="stok${rowCount}" readonly class="w-full p-2 rounded border bg-gray-100" required/>
                    </div>
                    <div class="flex flex-col justify-end w-1/12">
                            <button type="button" onclick="removeRow(${rowCount})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                Batal
                            </button>
                        </div>
                </div>
            </div>`;

            $('#produkContainer').append(row);
            bindBarangDropdown(rowCount);
        }

        function bindBarangDropdown(id) {
            $(`#barang${id}`).change(function() {
                const selected = $(this).find(':selected');
                $(`#jenis${id}`).val(selected.data('jenis') || '');
                $(`#satuan${id}`).val(selected.data('satuan') || '');
                $(`#stok${id}`).val(selected.data('stok') || '');
            });
        }

        $(document).ready(function() {
            $('#addRowBtn').on('click', function(e) {
                e.preventDefault();
                addRow();
            });
        });

        function removeRow(id) {
            $(`#row${id}`).remove();
        }
    </script>
</x-app-layout>
