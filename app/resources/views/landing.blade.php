<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.manager') }}</title>

    </head>
<body class="antialiased">
    <header>
        <h1>{{ __('trad.title') }}</h1>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href={{ url('/dashboard') }}>{{ __('trad.dashboard') }}</a>
                @else
                    <a href={{ route('login') }}>{{ __('trad.login') }}</a>

                    @if (Route::has('register'))
                        <a href={{ route('register') }}>{{ __('trad.register') }}</a>
                    @endif
                @endauth
            </div>
        @endif
        
    </header>
</body>
</html>