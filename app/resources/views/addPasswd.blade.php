<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.password.add_passwd') }}</title>

    </head>
<body>
    <header>
        <h1>{{ __('trad.password.add_passwd') }}</h1>
    </header>
    <main>
        @if (Route::has('newPasswd'))
            <form action={{ route('newPasswd') }} method="POST">
            
            @csrf
                <label for="url" style="margin: 0 0 0 10px;">{{ __('trad.password.url') }} : </label>
                <input type="url" name="url" id="url"/>
                @error('url')
                    <p>{{$message}}</p>
                @enderror


                <label for="email" style="margin: 0 0 0 30px;">{{ __('trad.password.id') }} : </label>
                <input type="email" name="email" id="email"/>
                @error('email')
                    <p>{{$message}}</p>
                @enderror


                <label for="mdp" style="margin: 0 0 0 30px;">{{ __('trad.password.pwd') }} : </label>
                <input type="password" name="mdp" id="mdp" minlength="8"/>
                @error('mdp')
                    <p>{{$message}}</p>
                @enderror


                <input type="submit" value={{ __('trad.submit') }} style="margin: 0 0 0 30px;"/>
                
            </form>
        @else
            <!-- Test de non fonctionnement de route -->
            <!-- Erreur 403 mauvaise dans ce cas mais seul erreur personnalisable, à approfondir -->
            {{ abort(403, 'La route demandée n\'existe pas.') }}
        @endif
    </main>
    <footer style="margin: 30px 0 0 0;">
        @if (Route::has('dashboard'))
            <a href={{ route('dashboard') }}>&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>