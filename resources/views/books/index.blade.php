@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- SECTION 1 --}}
    <div class="text-center mb-5">
        <h1 class="display-4">Welcome to Artful Books</h1>
        <p class="lead">
            Artful Books is a book recommendation web for book readers all around the world. 
            Find your best books, see other readers point of views, and explore all the books here.
        </p>
    </div>

    {{-- SECTION 2 --}}
    <h3 class="mb-4">Find Yours</h3>
    <div class="row">
        @forelse($books->take(4) as $book)
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

    {{-- SECTION 3 --}}
    <div class="text-center mt-4 mb-5">
        <a href="{{ route('books.list') }}" class="btn btn-primary btn-lg">See More</a>
    </div>

</div>
@endsection
