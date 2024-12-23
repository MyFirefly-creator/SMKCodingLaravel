@extends('component.app')

@section('content')
<h1>Data Gambar</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Konten</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>{{ $image->konten }}</td>
                <td><img src="{{ Storage::url($image->image) }}" width="100"></td>
                <td>{{ $image->kategori->kategori }}</td>
                <td>
                    <a href="{{ route('post.edit', $image->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('post.view', $image->id) }}" class="btn btn-secondary">View</a>
                    <form action="{{ route('post.destroy', $image->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $images->links() }}
@endsection
