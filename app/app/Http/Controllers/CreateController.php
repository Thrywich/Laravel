<?php
 
// Controller qui ajoute des données à la bdd

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;

use App\Models\Password;
use App\Models\Team;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
 
class CreateController extends Controller
{

    // Create a new password
    public function addPasswd(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'mdp' => 'required|string'
        ]);
        

        if ($validated) {
  
            // get user informations to push on the database
            $id = Auth::id();
            $url = $validated->validated()['url'];
            $mail = $validated->validated()['email'];
            $passwd = $validated->validated()['mdp'];
        
            Password::create(['site' => $url, 'login' => $mail, 'password' => $passwd, 'user_id' => $id]);

            // Ajout data dans un fichier Json (garder pour exemple)
            // $file = json_encode($validated->validated());
            // Storage::put(time().'.json', $file);
        
            return redirect(route('passwdList'));
          }

        // The blog post is not valid...
        return redirect(route('addPasswd'));
    }

    // Create a new team
    public function addTeam(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'team' => 'required|string|unique:teams,name'
        ]);

        if ($validated) {

            $id = Auth::id();
            $name = $validated->validated()['team'];

            $team = Team::create(['name' => $name]);
            $user = User::find($id);
            $user->teams()->syncWithoutDetaching([$team->id]);
        
            return redirect(route('teamList'));
        }

        // The blog post is not valid...
        return redirect(route('newTeam'));
    }
}