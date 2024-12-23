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
@endsection
