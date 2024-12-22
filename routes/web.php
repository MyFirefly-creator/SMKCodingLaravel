<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('index');
Route::get('sesi/register', [UserController::class, 'formRegister'])->name('formRegister');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('sesi/login', [UserController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

