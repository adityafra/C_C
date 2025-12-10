<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($suratMasuk) ? 'Edit Surat Masuk' : 'Tambah Surat Masuk' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>{{ isset($suratMasuk) ? 'Edit Surat Masuk' : 'Tambah Surat Masuk' }}</h1>

        <form action="{{ isset($suratMasuk) ? route('surat-masuk.update', $suratMasuk) : route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($suratMasuk))
                @method('PUT')
            @endif

            <!-- Nomor Surat -->
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ old('nomor_surat', $suratMasuk->nomor_surat ?? '') }}">
            </div>

            <!-- Pengirim -->
            <div class="mb-3">
                <label for="pengirim" class="form-label">Pengirim</label>
                <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ old('pengirim', $suratMasuk->pengirim ?? '') }}">
            </div>

            <!-- Perihal -->
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" id="perihal" class="form-control" value="{{ old('perihal', $suratMasuk->perihal ?? '') }}">
            </div>

            <!-- Tanggal Surat -->
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat ?? '') }}">
            </div>

            <!-- File -->
            <div class="mb-3">
                <label for="file" class="form-label">File (PDF/DOCX)</label>
                <input type="file" name="file" id="file" class="form-control">
                @if (isset($suratMasuk) && $suratMasuk->file_path)
                    <p class="mt-2">File saat ini: 
                        <a href="{{ Storage::url($suratMasuk->file_path) }}" target="_blank">Lihat File</a>
                    </p>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">{{ isset($suratMasuk) ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
