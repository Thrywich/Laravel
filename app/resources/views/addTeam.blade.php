<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create New Team</title>

    </head>
<body>
    <header>
        <h1>Create New Team</h1>
    </header>
    <main>
        <form action={{ route('newTeam') }} method="POST">
        
        @csrf
            <label for="team">Name : </label>
            <input name="team" id="team" required/>
            @error('text')
                <p>{{ $message }}</p>
            @enderror

            <input type="submit" value="Create"/>
            
        </form>
    </main>
    <footer>
        @if (Route::has('dashboard'))
            <a href="{{ route('dashboard') }}"><-- Dashboard</a>
        @endif
    </footer>
</body>
</html>