<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My passwords</title>

    </head>
<body>
    <main>
        <ul>
            @if ($infoUser->isNotEmpty())
                @foreach ($infoUser as $value)
                    <li style="margin: 0 0 20px 0; list-style: none;">
                        <table>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Website</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px; font-weight: bold;"><a href={{$value->site}} target="_blank">{{$value->site}}</a></td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Website Login</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->login}}</td>
                            </tr>
                            <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Website Password</td>
                                <td style="border: 2px solid; border-radius: 3px; padding: 5px;">{{$value->password}} <a href={{route('updatePasswd', ['id' => $value->id])}} style="font-size: small; margin: 5px 0 0 0;">Update password</a></td>
                            </tr>
                        </table>
                    </li>
                @endforeach
            @else
                <p>You have no password yet.</p>
            @endif
            <a href="{{ route('dashboard') }}"><-- Retour</a>
        </ul>
    </main>
    <footer>

    </footer>
</body>
</html>