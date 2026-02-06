@extends('layouts.app')

@section('content')

<div class="card auth-card">

    <div class="card-header">
        <div>
            <h1 id="auth-title">Login</h1>
            <p id="auth-subtitle">Connecte-toi pour accéder à tes books.</p>
        </div>

        <div class="navlinks">
            <button type="button" class="btn btn-primary" id="btn-login">Login</button>
            <button type="button" class="btn" id="btn-register">Register</button>
        </div>
    </div>

    <div class="card-body">

        @if($errors->any())
            <div class="error">
                <strong>Erreur</strong>
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- LOGIN FORM -->
        <form id="login-form" method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="field">
                <label for="login-email">Email</label>
                <input
                    id="login-email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="name@email.com"
                >
            </div>

            <div class="field" style="margin-top:14px;">
                <label for="login-password">Password</label>
                <input
                    id="login-password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                >
            </div>

            <div class="actions" style="margin-top:18px;">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>

            <div class="hint" style="margin-top:10px;">
                No account?
                <a href="#" id="link-to-register">Register</a>
            </div>
        </form>

        <!-- REGISTER FORM -->
        <form
            id="register-form"
            method="POST"
            action="{{ route('register.post') }}"
            style="display:none;"
        >
            @csrf

            <div class="field">
                <label for="reg-name">Name</label>
                <input
                    id="reg-name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    placeholder="Denis"
                >
            </div>

            <div class="field" style="margin-top:14px;">
                <label for="reg-email">Email</label>
                <input
                    id="reg-email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="name@email.com"
                >
            </div>

            <div class="form-grid" style="margin-top:14px;">
                <div class="field">
                    <label for="reg-password">Password</label>
                    <input
                        id="reg-password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    >
                </div>

                <div class="field">
                    <label for="reg-password-confirm">Confirm</label>
                    <input
                        id="reg-password-confirm"
                        name="password_confirmation"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    >
                </div>
            </div>

            <div class="actions" style="margin-top:18px;">
                <button type="submit" class="btn btn-primary">
                    Create account
                </button>
            </div>

            <div class="hint" style="margin-top:10px;">
                Already have an account?
                <a href="#" id="link-to-login">Login</a>
            </div>
        </form>

    </div>
</div>

<script>
(function () {
    const btnLogin = document.getElementById('btn-login');
    const btnRegister = document.getElementById('btn-register');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const title = document.getElementById('auth-title');
    const subtitle = document.getElementById('auth-subtitle');
    const linkToRegister = document.getElementById('link-to-register');
    const linkToLogin = document.getElementById('link-to-login');

    function showLogin() {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        title.textContent = 'Login';
        subtitle.textContent = 'Connecte-toi pour accéder à tes books.';
        btnLogin.classList.add('btn-primary');
        btnRegister.classList.remove('btn-primary');
    }

    function showRegister() {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        title.textContent = 'Register';
        subtitle.textContent = 'Crée ton compte pour gérer tes books.';
        btnRegister.classList.add('btn-primary');
        btnLogin.classList.remove('btn-primary');
    }

    btnLogin.addEventListener('click', showLogin);
    btnRegister.addEventListener('click', showRegister);

    if (linkToRegister) {
        linkToRegister.addEventListener('click', function (e) {
            e.preventDefault();
            showRegister();
        });
    }

    if (linkToLogin) {
        linkToLogin.addEventListener('click', function (e) {
            e.preventDefault();
            showLogin();
        });
    }

    // Affichage par défaut
    showLogin();
})();
</script>

@endsection
