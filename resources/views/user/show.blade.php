{{-- resources/views/user/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Price: ${{ $book->price }}</p>
    <a href="{{ route('user.purchase', $book->id) }}">Purchase</a>
    <a href="{{ route('user.reviewForm', $book->id) }}">Add Review</a>
</div>
@endsection
