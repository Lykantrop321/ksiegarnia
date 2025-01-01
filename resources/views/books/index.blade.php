{{-- resources/views/books/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista książek</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Lista książek</h1>
    <a href="{{ route('books.create') }}" style="margin-bottom: 15px; display: inline-block;">Dodaj nową książkę</a>
    @if ($books->isEmpty())
        <p>Brak książek do wyświetlenia.</p>
    @else
        <ul>
            @foreach ($books as $book)
                <li>
                    {{ $book->title }} autorstwa {{ $book->author }}
                    - <a href="{{ route('books.show', $book->id) }}">Szczegóły</a>
                    - <a href="{{ route('books.edit', $book->id) }}">Edytuj</a>
                    - <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć tę książkę?')">Usuń</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
