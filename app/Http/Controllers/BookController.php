<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Liste des books du user connecté
     */
    public function index()
    {
        $books = Book::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('books.index', compact('books'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    /**
     * Enregistrement d’un book (lié au user connecté)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:0', 'max:2100'],
            'isbn' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Book::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'author' => $validated['author'],
            'year' => $validated['year'] ?? null,
            'isbn' => $validated['isbn'] ?? null,
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('books.index')->with('status', 'Book created!');
    }

    /**
     * Afficher un book (uniquement si c’est celui du user)
     */
    public function show(Book $book)
    {
        $this->authorizeOwner($book);

        $book->load('category');

        return view('books.show', compact('book'));
    }

    /**
     * Formulaire édition (uniquement si c’est celui du user)
     */
    public function edit(Book $book)
    {
        $this->authorizeOwner($book);

        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update (uniquement si c’est celui du user)
     */
    public function update(Request $request, Book $book)
    {
        $this->authorizeOwner($book);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:0', 'max:2100'],
            'isbn' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('status', 'Book updated!');
    }

    /**
     * Delete (uniquement si c’est celui du user)
     */
    public function destroy(Book $book)
    {
        $this->authorizeOwner($book);

        $book->delete();

        return redirect()->route('books.index')->with('status', 'Book deleted!');
    }

    /**
     * Sécurité: un user ne peut gérer que SES books
     */
    private function authorizeOwner(Book $book): void
    {
        if ($book->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
