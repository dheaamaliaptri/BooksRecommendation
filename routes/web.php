<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Halaman daftar buku lengkap
Route::get('/books', [BookController::class, 'list'])->name('books.list');

// Detail buku
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::resource('reviews', ReviewController::class)->except(['index', 'create', 'show']);