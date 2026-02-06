@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 style="margin:0;">Edit book</h1>
                <p style="margin:6px 0 0;">
                    Update: <span style="color: rgba(242,242,242,0.9);">{{ $book->title }}</span>
                </p>
            </div>

            <a class="btn" href="{{ route('books.show', $book) }}">Back</a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="error">
                    <strong>Fix the errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="field">
                        <label for="title">Title</label>
                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $book->title) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="author">Author</label>
                        <input
                            id="author"
                            type="text"
                            name="author"
                            value="{{ old('author', $book->author) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id', $book->category_id) == $cat->id)>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="year">Year</label>
                        <input
                            id="year"
                            type="number"
                            name="year"
                            min="0"
                            max="2100"
                            value="{{ old('year', $book->year) }}"
                        >
                    </div>

                    <div class="field" style="grid-column: 1 / -1;">
                        <label for="isbn">ISBN</label>
                        <input
                            id="isbn"
                            type="text"
                            name="isbn"
                            value="{{ old('isbn', $book->isbn) }}"
                            placeholder="Optional"
                        >
                    </div>
                </div>

                <div class="actions">
                    <a class="btn" href="{{ route('books.show', $book) }}">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save</button>
