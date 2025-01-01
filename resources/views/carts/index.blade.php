@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Koszyk</h1>
    @forelse ($carts as $cart)
        <div>{{ $cart->book->title }} ({{ $cart->quantity }})</div>
        <form method="POST" action="{{ route('cart.remove', $cart->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Usuń</button>
        </form>
    @empty
        <p>Twój koszyk jest pusty.</p>
    @endforelse
</div>
@endsection
