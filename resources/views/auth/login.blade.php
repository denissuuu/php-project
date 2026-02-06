@extends('layouts.app')

@section('content')
<div class="card auth-card">
    <div class="card-header">
        <div>
            <h1>Login</h1>
            <p>Connecte-toi pour accéder à tes books.</p>
        </div>
        <a class="btn" href="{{ route('register') }}">Register</a>
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

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@email.com">
            </div>

            <div class="field" style="margin-top:14px;">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="••••••••">
            </div>

            <div class="auth-actions">
                <label class="check">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>

                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="hint" style="margin-top:10px;">
                No account? <a href="{{ route('register') }}">Register</a>
            </div>
        </form>

    </div>
</div>
@endsection
