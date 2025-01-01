{{-- resources/views/user/review.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add a Review</h1>
    <form method="post" action="{{ route('user.postReview', $book_id) }}">
        @csrf
        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" min="1" max="5" required>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea name="comment" required></textarea>
        </div>
        <button type="submit">Submit Review</button>
    </form>
</div>
@endsection
