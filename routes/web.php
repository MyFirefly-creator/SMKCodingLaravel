<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('sesi/register', [UserController::class, 'formRegister'])->name('formRegister');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('sesi/login', [UserController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/image', [PostController::class, 'index'])->name('post.index');
Route::get('/image/create', [PostController::class, 'create'])->name('post.create');
Route::post('/image', [PostController::class, 'store'])->name('post.store');
Route::get('/image/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/image/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/image/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/{id}/view', [PostController::class, 'view'])->name('post.view');
