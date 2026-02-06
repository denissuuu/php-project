<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect()->route('books.index');
});
Route::get('/auth', [AuthController::class, 'show'])->name('auth');
Route::get('/login', fn () => redirect()->route('auth'))->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * App (protégée)
 */
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});
