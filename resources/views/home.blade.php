@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to the Library</h1>

    <p>This application allows you to manage books and categories.</p>

    <ul>
        <li><a href="{{ route('books.index') }}">View books</a></li>
        <li><a href="{{ route('books.create') }}">Add a book</a></li>
    </ul>
@endsection
