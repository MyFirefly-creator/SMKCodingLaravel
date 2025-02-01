@extends('component.app')

@section('content')
<h1>Tambah Gambar</h1>

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="konten">Konten</label>
        <input type="text" name="konten" class="form-control" value="{{ old('konten') }}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
    </div>

    <div class="form-group">
        <label for="isi_deskripsi">Deskripsi Lebih Lanjut</label>
        <textarea name="isi_deskripsi" class="form-control" rows="4" required>{{ old('isi_deskripsi') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select name="kategori_id" class="form-control" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('textarea[name="deskripsi"]').summernote({
            height: 200
        });
        $('textarea[name="isi_deskripsi"]').summernote({
            height: 200
        });
    });
</script>
@endsection
