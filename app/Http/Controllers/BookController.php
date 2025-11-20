<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan semua buku di homepage (landing page)
    public function index()
    {
        $books = Book::all(); // bisa di-limit 4 di blade dengan ->take(4)
        return view('books.index', compact('books'));
    }

    // Menampilkan daftar buku lengkap + search
    public function list(Request $request)
    {
        $query = Book::query();

        // Jika ada parameter search, cari berdasarkan title atau author
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }

        $books = $query->get();

        return view('books.list', compact('books'));
    }

    // Menampilkan detail buku + review
    public function show(Book $book)
    {
        $book->load('reviews');
        return view('books.show', compact('book'));
    }
}
