<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')->where('user_id', auth()->id())->get();
        return view('carts.index', compact('carts'));
    }

    public function add(Request $request)
    {
        Cart::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'quantity' => 1  // Można później dodać logikę dla dynamicznej ilości
        ]);

        return back()->with('success', 'Książka dodana do koszyka.');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Pozycja usunięta z koszyka.');
    }
}
