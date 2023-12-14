<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>List team users</title>

    </head>
<body>
    <main>
        <h1>{{$name}}</h1>
        <div style="display: flex; justify-content: space-between; margin: 0 20vw 0 0;">
            <ul>
                @if ($infoUsers->isNotEmpty())
                    @foreach ($infoUsers as $value)
                        <li style="margin: 0 0 10px 0; list-style: none;">
                            <table>
                                <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                    <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Member : {{$value->name}}</td>
                                </tr>
                            </table>
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul>
                        <li style="margin: 0 0 10px 0; list-style: none;">
                            <table>
                                <tr style="border: 2px solid; border-radius: 3px; padding: 5px;">
                                    <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Partager par : </td>
                                    <td style="border: 2px solid; border-radius: 3px; padding: 5px;">Password : </td>
                                </tr>
                            </table>
                        </li>
            </ul>
        </div>
        
        <h2 style="margin: 40px 0 0 0">Add members</h2>
        <form action={{ route('addUser', ['idTeam' => $id]) }} method="POST" style="margin: 20px 0 40px 0">
        
        @csrf
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" required/>

            <input type="submit" value="Search"/>
            
        </form>
    </main>
    <footer>
        @if (Route::has('teamList'))
            <a href={{ route('teamList') }}><-- List team</a>
        @endif
    </footer>
</body>
</html>