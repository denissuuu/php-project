@extends('layouts.app')

@section('content')
<div class="card auth-card">
    <div class="card-header">
        <div>
            <h1>Register</h1>
            <p>Crée ton compte pour gérer tes books.</p>
        </div>
        <a class="btn" href="{{ route('login') }}">Login</a>
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

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" placeholder="Denis">
            </div>

            <div class="field" style="margin-top:14px;">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@email.com">
            </div>

            <div class="form-grid" style="margin-top:14px;">
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="••••••••">
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="••••••••">
                </div>
            </div>

            <div class="actions">
                <a class="btn" href="{{ route('login') }}">Back</a>
                <button type="submit" class="btn btn-primary">Create account</button>
            </div>
        </form>

    </div>
</div>
@endsection
