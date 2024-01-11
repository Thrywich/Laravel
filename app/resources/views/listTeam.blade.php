<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.team.my_team') }}</title>

    </head>
<body>
    <main>
        <h1>{{ __('trad.team.my_team') }}</h1>
        <ul>
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="margin: 0 0 10px 0; list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.name') }} : {{$value->name}}</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                    <a href={{route('teamUsersList', ['idTeam' => $value->id, 'name' => $value->name])}} style="margin: 5px 0 0 0;">{{ __('trad.team.info') }}</a>
                                </td>
                            </tr>
                        </table>
                    </li>
                @endforeach
            @else
                <div style="margin: 0 0 40px 0">
                    <p>You have no Team yet.</p>
                    @if (Route::has('addTeam'))
                        <a href={{ route('addTeam') }}>{{ __('trad.team.create_team') }}</a>
                    @endif
                </div>
            @endif
        </ul>
    </main>
    <footer style="margin-top: 30px;">
        @if (Route::has('dashboard'))
            <a href={{ route('dashboard') }}>&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>