<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyBooks</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header>
    <div class="container nav">
        <div class="brand">
            <div class="logo"></div>
            <span>MyBooks</span>
        </div>

        <div class="navlinks">
            @auth
                <!-- Nom du user connecté -->
                <span class="hint">
                    {{ auth()->user()->name }}
                </span>

                <a href="{{ route('books.index') }}" class="btn">
                    Books
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <!-- Rien ici volontairement -->
            @endguest
        </div>
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
