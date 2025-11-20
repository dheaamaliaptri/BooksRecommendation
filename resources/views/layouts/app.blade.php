<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artful Books</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">

    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        {{-- BRAND --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('books.index') }}">
            <img src="{{ asset('images/books/icon.jpg') }}" alt="Artful Books" width="40" class="me-2">
            <span class="fw-bold">Artful Books</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- NAV LINKS --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.index') ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('books.list') }}" class="nav-link {{ request()->routeIs('books.list') ? 'active' : '' }}">
                        Books
                    </a>
                </li>
            </ul>

            {{-- SEARCH FORM --}}
            <form class="d-flex" action="{{ route('books.list') }}" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Cari buku..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<main class="py-4">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer>
    <small>© {{ date('Y') }} Artful Books. All rights reserved.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
