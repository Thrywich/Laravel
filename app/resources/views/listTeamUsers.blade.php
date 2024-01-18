<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('trad.team.list_member') }}</title>

    </head>
<body>
    <main>
        <h1>{{$name}}</h1>
        <div style="display: flex; justify-content: space-between; margin: 0 20vw 0 0;">
            <ul style="padding: 0 0 0 10px; list-style: none;">
                @if ($infoUsers->isNotEmpty())
                    @foreach ($infoUsers as $value)
                        <li style="margin: 0 0 10px 0;">
                            {{$value->name}}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        
        <h2 style="margin: 40px 0 20px 0">{{ __('trad.team.find_member') }}</h2>
        <form action={{ route('addUser', ['idTeam' => $id]) }} method="POST">
        
        @csrf
            <label for="name" style="margin: 0 0 0 10px;">{{ __('trad.name') }} : </label>
            <input type="text" name="name" id="name" required/>

            <input type="submit" value={{ __('trad.submit') }} style="margin: 0 0 0 15px;"/>
            
        </form>
    </main>
    <footer style="display: flex; flex-direction: column; margin: 30px 0 0 0;">
        @if (Route::has('teamList'))
            <a href={{ route('teamList') }} style="margin: 0 0 10px 0;">&larr; {{ __('trad.team.my_team') }}</a>
        @endif
        @if (Route::has('dashboard'))
            <a href="{{ route('dashboard') }}">&larr; {{ __('trad.dashboard') }}</a>
        @endif
    </footer>
</body>
</html>