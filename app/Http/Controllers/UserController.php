<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $images = Post::orderBy('id', 'asc')->paginate(10);

        return view('dashboard.index', compact('images'));
    }


    public function formRegister()
    {
        return view('sesi.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|string|max:255|unique:users,name',
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
            'role' => 'user',
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil Registrasi.');
    }

    public function formLogin()
    {
        return view('sesi.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('dashboard')->with('success', 'Selamat Datang');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('dashboard')->with('success', 'Anda telah logout.');
    }
}
