<?php
 
 // Controller qui modifie des données de la bdd
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Models\Password;
use App\Notifications\addMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    // Update a password
    public function changePasswd(Request $request, $id)
    {
        $validated = Validator::make($request->all(),[
            'actualmdp' => 'required|string',
            'newmdp' => 'required|string'
        ]);

        $pwd = Password::find($id)->password;

        if ($validated) {
            if ($pwd != $validated->validated()['actualmdp']) {
                return redirect()->back();
            } else {
            $passwd = $validated->validated()['newmdp'];
            Password::where('id', $id)->first()->update(['password' => $passwd]);

            // Redirect on the password list of the user
            return redirect(route('passwdList'));
          }

            // The blog post is not valid...
            return redirect()->back();
        }
    }

    //Update a team with a new user
    public function addUsertoTeam($idUser, $idTeam)
    {
        // Add user to the team
        $team = Team::find($idTeam);
        $user = User::find($idUser);
        $user->teams()->syncWithoutDetaching([$team->id]);

        // Get all members of the team
        $dataUsers = Team::find($idTeam)->users;

        // Get info about the member who invite the guest
        $host = User::find(Auth::id());

        // Send a notification to all users of the team and also store data in the db
        foreach ($dataUsers as $userNotified) {
            $userNotified->notify(new addMember($user->name,$team->name,$host));
        }

        // Redirect on the list of all users of the team
        return redirect(route('teamUsersList', ['idTeam' => $idTeam]));
    }
}