<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search Users</title>

    </head>
<body>
    <main>
        <h1>User search</h1>
        <ul>
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="margin: 0 0 20px 0; list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Name : </td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px; font-weight: bold;">{{$value->name}}</td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Email : </td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->email}}</td>
                            </tr>
                        </table>
                    </li>
                    
                    <form action={{ route('addUserToTeam', ['idUser' => $value->id, 'idTeam' => $idTeam]) }} method="POST">
                    @csrf
                        <input type="submit" value="Add {{ $value->name }} to the team"/>
                    </form>

                @endforeach
            @else
                <p>There is no user with this name.</p>
            @endif
        </ul>
    </main>
    <footer>
        @if (Route::has('teamUsersList'))
            <a href={{ route('teamUsersList', ['idTeam' => $idTeam]) }}><-- List team users</a>
        @endif
    </footer>
</body>
</html>