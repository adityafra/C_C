<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Surat Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Surat Keluar</h1>

        <form action="{{ route('surat-keluar.update', $suratKeluar) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nomor Surat -->
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}">
                @error('nomor_surat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tujuan -->
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ old('tujuan', $suratKeluar->tujuan) }}">
                @error('tujuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Perihal -->
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" id="perihal" class="form-control" value="{{ old('perihal', $suratKeluar->perihal) }}">
                @error('perihal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Surat -->
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="{{ old('tanggal_surat', $suratKeluar->tanggal_surat) }}">
                @error('tanggal_surat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- File -->
            <div class="mb-3">
                <label for="file" class="form-label">File (PDF/DOCX)</label>
                <input type="file" name="file" id="file" class="form-control">
                @if ($suratKeluar->file_path)
                    <p class="mt-2">File saat ini: 
                        <a href="{{ Storage::url($suratKeluar->file_path) }}" target="_blank">Lihat File</a>
                    </p>
                @endif
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
