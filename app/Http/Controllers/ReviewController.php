<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Simpan review baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        Review::create($validated);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }

    // Tampilkan form edit review
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    // Update review
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        $review->update($validated);

        return redirect()->route('books.show', $review->book_id)
                        ->with('success', 'Review berhasil diperbarui!');
    }

    // Hapus review
    public function destroy(Review $review)
    {
        $bookId = $review->book_id;

        $review->delete();

        return redirect()->route('books.show', $bookId)
                        ->with('success', 'Review berhasil dihapus!');
    }
}
