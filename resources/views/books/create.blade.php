@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 style="margin:0;">Add book</h1>
                <p style="margin:6px 0 0;">Create a new book entry.</p>
            </div>

            <a class="btn" href="{{ route('books.index') }}">Back</a>
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

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="title">Title</label>
                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Ex: The Hobbit"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="author">Author</label>
                        <input
                            id="author"
                            type="text"
                            name="author"
                            value="{{ old('author') }}"
                            placeholder="Ex: J.R.R. Tolkien"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">-- choose --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>
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
                            value="{{ old('year') }}"
                            placeholder="Ex: 1937"
                        >
                    </div>

                    <div class="field" style="grid-column: 1 / -1;">
                        <label for="isbn">ISBN</label>
                        <input
                            id="isbn"
                            type="text"
                            name="isbn"
                            value="{{ old('isbn') }}"
                            placeholder="Optional"
                        >
                    </div>
                </div>

                <div class="actions">
                    <a class="btn" href="{{ route('books.index') }}">Cancel</a>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>

            <p class="hint" style="margin-top:12px;">
                Fields are validated server-side. CSRF protection is enabled by default.
            </p>
        </div>
    </div>
@endsection
