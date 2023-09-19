<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestionnaire de MDP</title>

    </head>
<body>
    <header>
        <h1>Welcome to my first Laravel Project</h1>
    </header>
    <main>
        @if (Route::has('newPassWord'))
            <a href="{{ route('newPassWord') }}">Add new password</a>
        @endif
    </main>
    <footer>

    </footer>
</body>
</html>