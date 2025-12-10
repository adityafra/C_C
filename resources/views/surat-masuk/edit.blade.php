<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Surat Masuk</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Surat Masuk</h1>
    
        <form action="{{ route('surat-masuk.update', $suratMasuk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}">
            </div>
    
            <div class="mb-3">
                <label for="pengirim" class="form-label">Pengirim</label>
                <input type="text" name="pengirim" class="form-control" id="pengirim" value="{{ old('pengirim', $suratMasuk->pengirim) }}">
            </div>
    
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" class="form-control" id="perihal" value="{{ old('perihal', $suratMasuk->perihal) }}">
            </div>
    
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat) }}">
            </div>
    
            <div class="mb-3">
                <label for="file" class="form-label">File (PDF/DOCX)</label>
                <input type="file" name="file" class="form-control" id="file">
                @if ($suratMasuk->file_path)
                    <p class="mt-2">File saat ini: 
                        <a href="{{ Storage::url($suratMasuk->file_path) }}" target="_blank">Lihat File</a>
                    </p>
                @endif
            </div>
    
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS (Optional, for extra components like modals, tooltips, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
