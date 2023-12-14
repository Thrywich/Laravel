<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My teams</title>

    </head>
<body>
    <main>
        <h1>List of my team</h1>
        <ul>
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="margin: 0 0 10px 0; list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Team name : {{$value->name}}</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                    <a href={{route('teamUsersList', ['idTeam' => $value->id, 'name' => $value->name])}} style="margin: 5px 0 0 0;">See team info</a>
                                </td>
                            </tr>
                        </table>
                    </li>
                @endforeach
            @else
                <div style="margin: 0 0 40px 0">
                    <p>You have no Team yet.</p>
                    @if (Route::has('addTeam'))
                        <a href={{ route('addTeam') }}><-- Create a team</a>
                    @endif
                </div>
            @endif
        </ul>
    </main>
    <footer>
        @if (Route::has('dashboard'))
            <a href={{ route('dashboard') }}><-- Dashboard</a>
        @endif
    </footer>
</body>
</html>