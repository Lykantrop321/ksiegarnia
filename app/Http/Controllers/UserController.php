<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Wyświetla stronę główną dla użytkowników.
     */
    public function index()
    {
        $books = Book::all(); // Pobiera wszystkie książki
        return view('user.dashboard', compact('books'));
    }

    /**
     * Pokazuje szczegóły pojedynczej książki.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('user.show', compact('book'));
    }

    /**
     * Procesuje zakup książki.
     */
    public function purchase(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        // Logika zakupu (może zawierać utworzenie zamówienia i przetworzenie płatności)
        Order::create([
            'user_id' => auth()->id(),
            'book_id' => $id,
            'status' => 'Completed' // Ustal odpowiedni status
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Purchase successful!');
    }

    /**
     * Formularz dla dodawania opinii o książce.
     */
    public function reviewForm($id)
    {
        return view('user.review', ['book_id' => $id]);
    }

    /**
     * Zapisuje opinię o książce.
     */
    public function postReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000'
        ]);

        $book = Book::findOrFail($id);
        $book->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('user.show', $id)->with('success', 'Review added successfully!');
    }
}
