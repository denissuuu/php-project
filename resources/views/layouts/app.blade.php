<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'php-project')</title>
</head>
<body>
    <header style="padding:16px; border-bottom:1px solid #ddd;">
        <nav style="max-width:900px; margin:0 auto; display:flex; gap:12px;">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('books.create') }}">Add book</a>
        </nav>
    </header>

    <main style="max-width:900px; margin:24px auto; padding:0 16px;">
        @if (session('success'))
            <div style="padding:12px; background:#e8ffe8; border:1px solid #a6e3a6; margin-bottom:16px;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
