@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <h1>Books</h1>

    @if ($books->count() === 0)
        <p>No books yet.</p>
    @else
        <table cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse; width:100%;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->year ?? '-' }}</td>
                        <td>{{ $book->isbn ?? '-' }}</td>
                        <td style="white-space:nowrap;">
                            <a href="{{ route('books.edit', $book) }}">Edit</a>

                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
