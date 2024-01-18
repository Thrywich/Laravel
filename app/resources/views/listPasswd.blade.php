<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.password.my_passwd') }}</title>

    </head>
<body>
    <main>
        <h1>{{ __('trad.password.my_passwd') }}</h1>
        <ul style="margin: 0;">
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.password.url') }}</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px; font-weight: bold;"><a href={{$value->site}} target="_blank">{{$value->site}}</a></td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.password.id') }}</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->login}}</td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.password.pwd') }}</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->password}} <a href={{route('passwdToUpdate', ['id' => $value->id])}} style="font-size: small; margin: 5px 0 0 0;">{{ __('trad.password.update') }}</a></td>
                            </tr>
                        </table>
                    </li>
                @endforeach
            @else
                <div style="margin: 20px 0 20px 0">
                    <p>{{ __('trad.password.no_passwd') }}</p>
                    @if (Route::has('addPasswd'))
                        <a href={{ route('addPasswd') }}>{{ __('trad.password.add_passwd') }}</a>
                    @endif
                </div>
            @endif
        </ul>
    </main>
    <footer style="margin: 30px 0 0 0;">
        @if (Route::has('dashboard'))
            <a href={{ route('dashboard') }}>&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>