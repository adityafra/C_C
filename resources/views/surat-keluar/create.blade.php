<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Surat Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Surat Keluar</h1>

        <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nomor Surat -->
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ old('nomor_surat') }}">
                @error('nomor_surat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tujuan -->
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ old('tujuan') }}">
                @error('tujuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Perihal -->
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" id="perihal" class="form-control" value="{{ old('perihal') }}">
                @error('perihal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Surat -->
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="{{ old('tanggal_surat') }}">
                @error('tanggal_surat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- File -->
            <div class="mb-3">
                <label for="file" class="form-label">File (PDF/DOCX)</label>
                <input type="file" name="file" id="file" class="form-control">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
