<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.password.update') }}</title>

    </head>
<body>
    <header>
        <h1>{{ __('trad.password.update') }}</h1>
    </header>
    <main>
        @if ($data->isNotEmpty())
            @foreach ($data as $value)
                <form action={{ route('updatePasswd', ['id' => $value->id]) }} method="POST">
                @csrf

                    <label for="mdp" style="margin: 0 0 0 10px;">{{ __('trad.password.current_passwd') }} : </label>
                    <input type="password" name="actualmdp" id="actualmdp" minlength="8"/>
                    @error('mdp')
                        <p>{{$message}}</p>
                    @enderror

                    <label for="mdp" style="margin: 0 0 0 30px;">{{ __('trad.password.new_passwd') }} : </label>
                    <input type="password" name="newmdp" id="newmdp" minlength="8"/>
                    @error('mdp')
                        <p>{{$message}}</p>
                    @enderror

                    <input type="submit" value={{ __('trad.submit') }} style="margin: 0 0 0 30px;"/>
                </form>
            @endforeach
        @endif
    </main>
    <footer style="display: flex; flex-direction: column; margin-top: 30px;">
        @if (Route::has('passwdList'))
            <a href={{ route('passwdList') }} style="margin-bottom: 10px;">&larr; {{ __('trad.password.my_passwd') }}</a>
        @endif
        @if (Route::has('dashboard'))
            <a href={{ route('dashboard') }}>&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>