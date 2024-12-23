@extends('component.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Lihat Gambar</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Konten: {{ $image->konten }}</h5>
            <p class="card-text">Kategori: {{ $image->kategori->kategori }}</p>
            <p class="card-text">Dikirim oleh: {{ $image->user->name }}</p>
        </div>
        <img src="{{ Storage::url($image->image) }}" class="card-img-top" alt="{{ $image->konten }}" style="width: 200px; height: auto;">
    </div>

    <a href="{{ route('post.index') }}" class="btn btn-primary">Kembali ke daftar</a>
</div>
@endsection
