<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $dataKategori = Kategori::orderBy('id', 'asc')->paginate(10);
        return view('kategori.index', compact('dataKategori'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        return view('kategori.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $kategori = Kategori::find($id);
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::find($id);
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori->update([
            'kategori' => $request->kategori,
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $kategori = Kategori::find($id);
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
