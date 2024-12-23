@extends('component.app')

@section('content')
<h1>Edit Gambar</h1>

<form action="{{ route('post.update', $image->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="konten">Konten</label>
        <input type="text" name="konten" class="form-control" value="{{ old('konten', $image->konten) }}" required>
    </div>

    <div class="form-group">
        <label for="image">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        <img src="{{ Storage::url($image->image) }}" width="100" class="mt-2">
    </div>

    <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select name="kategori_id" class="form-control" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $image->KategoriID ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
