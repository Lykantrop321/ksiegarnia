<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        $books = Book::with('reviews')->get(); // Loads books along with their reviews
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        try {
            Book::create($validated);
            return redirect()->route('books.index')->with('success', 'Book successfully added.');
        } catch (\Exception $e) {
            Log::error('Error creating book: ' . $e->getMessage());
            return back()->withErrors('There was an error adding the book.');
        }
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        $book->load('reviews');
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        try {
            $book->update($validated);
            return redirect()->route('books.index')->with('success', 'Book successfully updated.');
        } catch (\Exception $e) {
            Log::error('Error updating book: ' . $e->getMessage());
            return back()->withErrors('There was an error updating the book.');
        }
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book successfully deleted.');
        } catch (\Exception $e) {
            Log::error('Error deleting book: ' . $e->getMessage());
            return back()->withErrors('There was an error deleting the book.');
        }
    }
}
