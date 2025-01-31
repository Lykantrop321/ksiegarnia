<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Logika dla tworzenia zamówienia
    }

    public function store(Request $request)
    {
        // Zapisz zamówienie w bazie danych
    }
}
