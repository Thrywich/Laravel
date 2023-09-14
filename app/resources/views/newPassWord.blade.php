<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nouveau mot de passe</title>

    </head>
<body>
    <header>
        <h1>Interface formulaire pour un nouveau formulaire</h1>
    </header>
    <main>
        <form action="{{ route('form') }}" method="POST">
        @csrf

            <label for="url">URL : </label>
            <input type="url" name="url" id="url" required />

            <label for="email">Enter your email : </label>
            <input type="email" name="email" id="email" required />

            <label for="mdp">Enter your password : </label>
            <input type="password" name="mdp" id="mdp" minlength="8" required />

            <input type="submit" value="Submit"/>
            
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>