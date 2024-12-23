@extends('component.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary my-3">Tambah Kategori</a>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataKategori as $key => $kategori)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $kategori->kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $dataKategori->links() }}
    </div>
</div>
@endsection
