@extends('component.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Tambah Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Masukkan nama kategori" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
