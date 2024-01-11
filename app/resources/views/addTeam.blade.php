<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.team.create_team') }}</title>

    </head>
<body>
    <header>
        <h1>{{ __('trad.team.create_team') }}</h1>
    </header>
    <main>
        <form action={{ route('newTeam') }} method="POST">
        
        @csrf
            <label for="team" style="margin: 0 0 0 10px;">{{ __('trad.name') }} : </label>
            <input name="team" id="team" required/>
            @error('text')
                <p>{{ $message }}</p>
            @enderror

            <input type="submit" value={{ __('trad.submit') }} style="margin: 0 0 0 15px;"/>
            
        </form>
    </main>
    <footer style="margin: 30px 0 0 0;">
        @if (Route::has('dashboard'))
            <a href="{{ route('dashboard') }}">&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>