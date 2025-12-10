<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Masuk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Surat Masuk') }}
        </h2>
    </x-slot>
    {{-- 202253084 --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">Tambah Surat</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-4">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Pengirim</th>
                                    <th>Perihal</th>
                                    <th>Tanggal Surat</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suratMasuk as $surat)
                                    <tr>
                                        <td>{{ $surat->nomor_surat }}</td>
                                        <td>{{ $surat->pengirim }}</td>
                                        <td>{{ $surat->perihal }}</td>
                                        <td>{{ $surat->tanggal_surat }}</td>
                                        <td>
                                            @if ($surat->file_path)
                                                <!-- Tombol untuk mengunduh file surat masuk -->
                                                <a href="{{ route('surat-masuk.download', $surat) }}" class="btn btn-sm btn-info">Unduh</a>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('surat-masuk.edit', $surat) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('surat-masuk.destroy', $surat) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</x-app-layout>
</html>
