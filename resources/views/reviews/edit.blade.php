@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h3 class="mb-3" style="font-weight: 600;">Edit Your Review</h3>

                    {{-- Error Alerts --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Perbaiki beberapa kesalahan berikut:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Your Name</label>
                            <input 
                                type="text"
                                name="reviewer_name"
                                class="form-control form-control-lg"
                                value="{{ old('reviewer_name', $review->reviewer_name) }}"
                                required
                            >
                        </div>

                        {{-- Rating --}}
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Rating</label>
                            <select name="rating" class="form-select form-select-lg" required>
                                <option value="">Select rating…</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
                                        ⭐ {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        {{-- Review --}}
                        <div class="mb-4">
                            <label class="form-label" style="font-weight: 500;">Your Review</label>
                            <textarea 
                                name="review_text"
                                class="form-control"
                                rows="5"
                                required
                            >{{ old('review_text', $review->review_text) }}</textarea>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4">
                                Update Review
                            </button>

                            <a href="{{ route('books.show', $review->book_id) }}" class="btn btn-outline-secondary px-4">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
