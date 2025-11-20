@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4 text-center">All Books</h2>

    <div class="row">
        @forelse($books as $book)
            <div class="col-md-3 mb-4">
                <a href="{{ route('books.show', $book->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card h-100 book-card">
                        <img src="{{ asset('images/books/' . $book->cover_image) }}" 
                            class="card-img-top book-cover" 
                            alt="{{ $book->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="book-title">{{ $book->title }}</h5>
                            <p class="book-author">{{ $book->author }}</p>
                            <div class="mt-auto">
                                <span class="rating-badge">⭐ {{ number_format($book->averageRating(), 1) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-muted">Not Found.</p>
        @endforelse
    </div>

</div>
@endsection
