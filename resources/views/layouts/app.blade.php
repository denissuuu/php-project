<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'php-project')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<header>
    <div class="container">
        <div class="nav">
            <div class="brand">
                <div class="logo"></div>
                <a href="{{ url('/') }}">php-project</a>
            </div>

            <div class="navlinks">
                <a class="btn" href="{{ url('/') }}">Home</a>
                <a class="btn" href="{{ route('books.index') }}">Books</a>
                <a class="btn btn-primary" href="{{ route('books.create') }}">Add book</a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</main>
</body>
</html>
