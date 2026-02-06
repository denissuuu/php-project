@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 style="margin:0;">Welcome</h1>
                <p style="margin:6px 0 0;">A simple Laravel app to manage books & categories.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('books.index') }}">Open Books</a>
        </div>

        <div class="card-body">
            <div class="form-grid">
                <div class="card" style="box-shadow:none;">
                    <div class="card-body">
                        <h3 style="margin:0 0 6px;">Books</h3>
                        <p>View, create, edit and delete books.</p>
                        <div class="actions" style="justify-content:flex-start;">
                            <a class="btn" href="{{ route('books.index') }}">List</a>
                            <a class="btn btn-primary" href="{{ route('books.create') }}">Add</a>
                        </div>
                    </div>
                </div>

                <div class="card" style="box-shadow:none;">
                    <div class="card-body">
                        <h3 style="margin:0 0 6px;">Security</h3>
                        <p>CSRF protection + server-side validation + Blade escaping.</p>
                        <div class="actions" style="justify-content:flex-start;">
                            <a class="btn" href="{{ route('books.index') }}">See it in action</a>
                        </div>
                    </div>
                </div>
            </div>

            <p style="margin-top:14px;">
                Tip: use the navigation bar to move around.
            </p>
        </div>
    </div>
@endsection
