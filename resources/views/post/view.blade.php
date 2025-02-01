@extends('component.app')

@section('content')
<div class="container my-5">
    <div class="row gx-5">
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <img src="{{ Storage::url($image->image) }}" class="img-fluid rounded"
                     style="max-height: 600px; object-fit: cover;" alt="{{ $image->konten }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="fw-bold text-primary">{{ $image->konten }}</h2>
                    <p class="text-muted">Kategori: {{ $image->kategori->kategori }}</p>
                    <p class="text-muted">Deskripsi: {!! $image->deskripsi !!}</p>
                    <p><strong>Oleh:</strong> {{ $image->user->name }}</p>
                </div>
            </div>

            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <p class="text-muted">Lebih Lanjut: {!! $image->isi_deskripsi !!}</p>
                </div>
            </div>

            <a href="{{ route('post.index') }}" class="btn btn-primary w-100 mt-3">Kembali ke daftar</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 10px;
    }

    .card-body button {
        transition: background-color 0.3s ease-in-out;
    }

    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        vertical-align: middle;
    }

    .gallery-item img {
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease-in-out;
    }

    .gallery-item img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-warning {
        transition: background-color 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #f0ad4e;
        color: white;
    }

    .text-muted {
        font-size: 14px;
    }
</style>
@endpush
