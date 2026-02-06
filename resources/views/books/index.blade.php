@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 style="margin:0;">Books</h1>
                <p style="margin:6px 0 0;">Manage your library collection.</p>
            </div>

            <a class="btn btn-primary" href="{{ route('books.create') }}">
                Add book
            </a>
        </div>

        <div class="card-body">
            @if ($books->count() === 0)
                <p>No books yet.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Year</th>
                            <th>ISBN</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>
                                    <a href="{{ route('books.show', $book) }}">
                                        {{ $book->title }}
                                    </a>
                                </td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->year ?? '-' }}</td>
                                <td>{{ $book->isbn ?? '-' }}</td>
                                <td style="white-space:nowrap; text-align:right;">
                                    <a class="btn" href="{{ route('books.edit', $book) }}">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        style="display:inline;"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                            onclick="return confirm('Delete this book?')"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
