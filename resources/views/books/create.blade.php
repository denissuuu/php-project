@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <h1>Add book</h1>

    @if ($errors->any())
        <div style="padding:12px; background:#ffe8e8; border:1px solid #e3a6a6; margin-bottom:16px;">
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

        <div style="margin-bottom:12px;">
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div style="margin-bottom:12px;">
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author') }}" required>
        </div>

        <div style="margin-bottom:12px;">
            <label>Category</label><br>
            <select name="category_id" required>
                <option value="">-- choose --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom:12px;">
            <label>Year</label><br>
            <input type="number" name="year" min="0" max="2100" value="{{ old('year') }}">
        </div>

        <div style="margin-bottom:12px;">
            <label>ISBN</label><br>
            <input type="text" name="isbn" value="{{ old('isbn') }}">
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
