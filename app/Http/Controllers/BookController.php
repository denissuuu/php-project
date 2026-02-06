<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->orderBy('title')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'year' => ['nullable', 'integer', 'min:0', 'max:2100'],
            'isbn' => ['nullable', 'string', 'max:50', 'unique:books,isbn'],
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book->load('category');
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'year' => ['nullable', 'integer', 'min:0', 'max:2100'],
            'isbn' => ['nullable', 'string', 'max:50', Rule::unique('books', 'isbn')->ignore($book->id)],
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
