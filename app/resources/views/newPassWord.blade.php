<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Password</title>

    </head>
<body>
    <header>
        <h1>Add New Password</h1>
    </header>
    <main>
        <form action={{ route('form') }} method="POST">
        @csrf

            <label for="url">URL : </label>
            <input type="url" name="url" id="url"/>
            @error('url')
                <p>{{$message}}</p>
            @enderror


            <label for="email">Enter your email : </label>
            <input type="email" name="email" id="email"/>
            @error('email')
                <p>{{$message}}</p>
            @enderror


            <label for="mdp">Enter your password : </label>
            <input type="password" name="mdp" id="mdp" minlength="8"/>
            @error('mdp')
                <p>{{$message}}</p>
            @enderror


            <input type="submit" value="Submit"/>
            
        </form>
    </main>
    <footer style="margin-top:50px;">
        <a href="{{ route('dashboard') }}"><-- Retour</a>
    </footer>
</body>
</html>