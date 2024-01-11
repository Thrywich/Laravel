<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.team.find_member') }}</title>

    </head>
<body>
    <main>
        <h1>{{ __('trad.team.find_member') }}</h1>
        <ul>
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="margin: 0 0 20px 0; list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.name') }} : </td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px; font-weight: bold; display: flex; align-items: center; justify-content: space-between;">
                                    {{$value->name}}
                                    <form action={{ route('addUserToTeam', ['idUser' => $value->id, 'idTeam' => $idTeam]) }} method="POST">
                                    @csrf
                                        <input type="submit" value={{ __('trad.team.add') }}>
                                    </form>
                                </td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{ __('trad.email') }} : </td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->email}}</td>
                            </tr>
                        </table>
                    </li>

                @endforeach
            @else
                <p>{{ __('trad.team.no_user') }}</p>
            @endif
        </ul>
    </main>
    <footer style="display: flex; flex-direction: column; margin: 30px 0 0 0;">
        @if (Route::has('teamUsersList'))
            <a href={{ route('teamUsersList', ['idTeam' => $idTeam]) }} style="margin: 0 0 10px 0;">&larr; {{ __('trad.team.list_member') }}</a>
        @endif
        @if (Route::has('dashboard'))
            <a href="{{ route('dashboard') }}">&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>