<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- 202253155 --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Preview Surat Masuk</h3>
                    <table class="w-full border-collapse border border-gray-500 text-left">
                        <thead>
                            <tr>
                                <th class="border border-gray-500 px-4 py-2">Nomor Surat</th>
                                <th class="border border-gray-500 px-4 py-2">Pengirim</th>
                                <th class="border border-gray-500 px-4 py-2">Perihal</th>
                                <th class="border border-gray-500 px-4 py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratMasuk as $surat)
                                <tr>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->nomor_surat }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->pengirim }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->perihal }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->tanggal_surat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-500 px-4 py-2 text-center">Tidak ada data surat masuk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <h3 class="text-lg font-semibold mt-6 mb-4">Preview Surat Keluar</h3>
                    <table class="w-full border-collapse border border-gray-500 text-left">
                        <thead>
                            <tr>
                                <th class="border border-gray-500 px-4 py-2">Nomor Surat</th>
                                <th class="border border-gray-500 px-4 py-2">Tujuan</th>
                                <th class="border border-gray-500 px-4 py-2">Perihal</th>
                                <th class="border border-gray-500 px-4 py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratKeluar as $surat)
                                <tr>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->nomor_surat }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->tujuan }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->perihal }}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{ $surat->tanggal_surat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-500 px-4 py-2 text-center">Tidak ada data surat keluar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
