<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista pracowników</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Załaduj plik CSS jeśli potrzebujesz -->
</head>
<body>
    <h1>Lista pracowników</h1>
    <a href="{{ route('pracownicy.create') }}" class="btn btn-primary" style="margin-bottom: 15px;">Dodaj nowego pracownika</a>

    @if ($pracownicy->isEmpty())
        <p>Brak pracowników do wyświetlenia.</p>
    @else
        <ul>
            @foreach ($pracownicy as $pracownik)
                <li>
                    {{ $pracownik->imie }} {{ $pracownik->nazwisko }}
                    - <a href="{{ route('pracownicy.show', $pracownik->id) }}">Szczegóły</a>
                    - <a href="{{ route('pracownicy.edit', $pracownik->id) }}">Edytuj</a>
                    - <form action="{{ route('pracownicy.destroy', $pracownik->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego pracownika?')">Usuń</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
