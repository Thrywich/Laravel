<?php
 
// Controller qui ajoute ou supprime des données de la bdd

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Password;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
 
class PostController extends Controller
{

    // Store a new password
    public function store(Request $request)
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

            // Ajout data dans un fichier Json
            // $file = json_encode($validated->validated());
            // Storage::put(time().'.json', $file);
        
            return redirect(route('dashboard'));
          }

        // The blog post is not valid...
        return redirect(route('form'));
    }

    // Change a password
    public function change(Request $request, $pwd, $id)
    {
        $validated = Validator::make($request->all(),[
            'actualmdp' => 'required|string',
            'newmdp' => 'required|string'
        ]);
        

        if ($validated) {
            if ($pwd != $validated->validated()['actualmdp']) {
                return redirect(route('updatePasswd', ['id' => $id]));
            } else {
            $passwd = $validated->validated()['newmdp'];
            Password::where('id', $id)->first()->update(['password' => $passwd]);
        
            return redirect(route('dashboard'));
          }

            // The blog post is not valid...
            return redirect(route('updatePasswd', ['id' => $id]));
        }
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
        
            return redirect(route('dashboard'));
        }

        // The blog post is not valid...
        return redirect(route('newTeam'));
    }

    // Get all User with the name search
    public function foundUser(Request $request)
    { 
        $validated = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if ($validated) {

            $name = $validated->validated()['name'];

            $data = User::select(['name','email'])->where('name', $name)->get();

            return view('searchUser', ['infoUser' => $data]);
        }

        // The blog post is not valid...
        return redirect(route('teamUsersList'));
    }
}