@extends('component.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Dashboard</h2>

    <div class="row">
        @foreach($images as $image)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ Storage::url($image->image) }}" class="card-img-top" alt="{{ $image->konten }}" style="width: 100%; height: 100px; object-fit: cover;" data-bs-toggle="tooltip" title="{{ $image->konten }}" onclick="window.location='{{ route('post.view', $image->id) }}'">
                <div class="card-body">
                    <h5 class="card-title">{{ $image->konten }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
