@extends('component.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" value="{{ $kategori->kategori }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
