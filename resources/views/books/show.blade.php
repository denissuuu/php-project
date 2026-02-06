@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <h1>{{ $book->title }}</h1>

    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Category:</strong> {{ $book->category->name }}</p>
    <p><strong>Year:</strong> {{ $book->year ?? '-' }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn ?? '-' }}</p>

    <p>
        <a href="{{ route('books.edit', $book) }}">Edit</a>
        |
        <a href="{{ route('books.index') }}">Back</a>
    </p>
@endsection
