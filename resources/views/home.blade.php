<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
</head>
<body>
    <h1>Witaj na stronie głównej!</h1>
    <a href="{{ route('login') }}">Logowanie</a>
    <a href="{{ route('register') }}">Rejestracja</a>
</body>
</html>
