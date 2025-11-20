@extends('layouts.app')

@section('content')
<div class="container show-book-container">

    {{-- SECTION: BOOK HEADER --}}
    <div class="row book-header">
        <div class="col-md-4 text-center">
            <div class="book-cover-large">
                <img src="{{ asset('images/books/' . $book->cover_image) }}" 
                    alt="{{ $book->title }}">
            </div>
        </div>

        <div class="col-md-8 book-detail-text">
            <h2 class="book-title-detail">{{ $book->title }}</h2>
            <h5 class="book-author-detail">oleh {{ $book->author }}</h5>

            <div class="book-rating-display mt-2">
                @php $avg = number_format($book->averageRating(),1); @endphp
                @for($i=1; $i<=5; $i++)
                    <span class="{{ $i <= round($avg) ? 'text-warning' : '' }}">★</span>
                @endfor
                <span class="rating-number">{{ $avg }}</span> / 5
                <span class="total-reviews">({{ $book->reviews->count() }} ulasan)</span>
            </div>

            <p class="book-description mt-4">{{ $book->description }}</p>
        </div>
    </div>

    <hr>

    {{-- SECTION: LIST OF REVIEWS --}}
    <h3 class="review-section-title">💬 What Readers Think</h3>

    @forelse($book->reviews as $review)
    <div class="review-card">

        <div class="review-header">
            <div class="reviewer-name">{{ $review->reviewer_name ?? 'Pengguna Tidak Dikenal' }}</div>
            <div class="review-rating">
                @for($i=1; $i<=5; $i++)
                    <span class="{{ $i <= $review->rating ? 'text-warning' : '' }}">★</span>
                @endfor
            </div>
        </div>

        <div class="review-body">
            {{ $review->review_text }}
        </div>

        <div class="review-actions">
            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>

    </div>
    @empty
        <p class="text-muted">No review yet. Be the first!</p>
    @endforelse

    <hr>

    {{-- SECTION: ADD REVIEW --}}
    <h3 class="review-section-title">Add Your Review</h3>

    <form action="{{ route('reviews.store') }}" method="POST" class="add-review-form">
        @csrf

        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="reviewer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rate</label>
            <select name="rating" class="form-control" required>
                <option value="">-- Pick Yours --</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea name="review_text" class="form-control" rows="3" required></textarea>
        </div>

        <button class="btn btn-primary btn-add-review">Send</button>
    </form>

</div>
@endsection
