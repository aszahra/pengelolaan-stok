<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="text-center w-full font-bold mb-9">
                            <div class="w-full">
                                FORM INPUT LAPORAN
                            </div>
                        </div>
                    </div>

                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('laporan.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for=""
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari</label>
                                    <input type="date" id="dari" name="dari"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for=""
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai</label>
                                    <input type="date" id="sampai" name="sampai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                            <button type="submit" class="bg-green-400 m-2 w-40 h-10 rounded-xl">Print</button>
                            <button type="reset" class="bg-red-500 m-2 w-40 h-10 rounded-xl">Batal</button>
                        </form>
                    </div>
                    {{-- =================== --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
