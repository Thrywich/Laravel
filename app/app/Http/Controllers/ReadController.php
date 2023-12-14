<?php
 
// Controller qui lit les données de la bdd

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ReadController extends Controller
{
    // Récupère tous les mdp de l'utilisateur
    public function foundPasswd()
    { 
        $data = Password::select(['site', 'login', 'password', 'id'])->where('user_id', Auth::id())->get();

        return view('listPasswd', ['infoUser' => $data]);
    }
    
    // Récupère les infos du mdp à modifier
    public function passwdToUpdate($id)
    { 
        $data = Password::select(['id','password'])->where('id', $id)->get();

        return view('updatePasswd', ['data' => $data]);
    }

    // Récupère toutes les teams auxquelles appartient l'utilisateur
    public function foundTeams()
    { 
        $data = Auth::user()->teams;

        return view('listTeam', ['infoUser' => $data]);
    }

    // Récupère tous les utilisateurs d'une team
    public function foundTeamUsers($id)
    { 
        $dataUsers = Team::find($id)->users;
        $dataTeam = Team::find($id)->name;

        return view('listTeamUsers', ['infoUsers' => $dataUsers, 'name' => $dataTeam, 'id' => $id]);
    }

    // Récupère les utilisateur portant le nom rechercher et transmet l'id de la team où il sera ajouté
    public function foundUser(Request $request, $idTeam)
    { 
        $validated = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if ($validated) {

            $name = $validated->validated()['name'];

            $data = User::select(['id','name','email'])->where('name', $name)->get();

            return view('searchedUser', ['infoUser' => $data, 'idTeam' => $idTeam]);
        }

        // The blog post is not valid...
        return redirect()->back();
    }
}