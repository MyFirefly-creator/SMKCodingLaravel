<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $images = Post::orderBy('id', 'asc')->paginate(10);
        return view('post.index', compact('images'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $kategoris = Kategori::all();
        return view('post.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'konten' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi_deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Post::create([
            'image' => $imagePath,
            'konten' => $request->konten,
            'deskripsi' => $request->deskripsi,
            'isi_deskripsi' => $request->isi_deskripsi,
            'UserID' => Auth::id(),
            'KategoriID' => $request->kategori_id,
        ]);

        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $image = Post::find($id);
        $kategoris = Kategori::all();
        if (!$image) {
            return redirect()->route('post.index')->with('error', 'Gambar tidak ditemukan.');
        }

        return view('post.edit', compact('image', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'konten' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi_deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $image = Post::find($id);
        if (!$image) {
            return redirect()->route('post.index')->with('error', 'Gambar tidak ditemukan.');
        }

        $imagePath = $image->image;
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $image->image);
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $image->update([
            'image' => $imagePath,
            'konten' => $request->konten,
            'deskripsi' => $request->deskripsi,
            'isi_deskripsi' => $request->isi_deskripsi,
            'UserID' => Auth::id(),
            'KategoriID' => $request->kategori_id,
        ]);

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $image = Post::find($id);
        if (!$image) {
            return redirect()->route('post.index')->with('error', 'Gambar tidak ditemukan.');
        }

        Storage::delete('public/' . $image->image);

        $image->delete();

        return redirect()->route('post.index');
    }

    public function view($id)
    {
        $image = Post::find($id);
        if (!$image) {
            return redirect()->route('post.index')->with('error', 'Gambar tidak ditemukan.');
        }

        return view('post.view', compact('image'));
    }

}
