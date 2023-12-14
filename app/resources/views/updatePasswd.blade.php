<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Update Password</title>

    </head>
<body>
    <header>
        <h1>Update my password</h1>
    </header>
    <main>
        @if ($data->isNotEmpty())
            @foreach ($data as $value)
                <form action={{ route('updatePasswd', ['id' => $value->id]) }} method="POST">
                @csrf

                    <label for="mdp">Current Password : </label>
                    <input type="password" name="actualmdp" id="actualmdp" minlength="8"/>
                    @error('mdp')
                        <p>{{$message}}</p>
                    @enderror

                    <label for="mdp">Enter your new password : </label>
                    <input type="password" name="newmdp" id="newmdp" minlength="8"/>
                    @error('mdp')
                        <p>{{$message}}</p>
                    @enderror

                    <input type="submit" value="Submit"/>
                </form>
            @endforeach
        @endif
    </main>
    <footer>
        @if (Route::has('passwdList'))
            <a href="{{ route('passwdList') }}"><-- Password list</a>
        @endif
    </footer>
</body>
</html>