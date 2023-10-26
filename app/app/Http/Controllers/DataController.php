<?php
 
// Controller qui récupère ou modifie les données de la bdd

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Password;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    // Récupère tous les mdp de l'utilisateur
    public function foundPasswords()
    { 
        $data = Password::select(['site', 'login', 'password', 'id'])->where('user_id', Auth::id())->get();

        return view('listPassWord', ['infoUser' => $data]);
    }

    // Modifie le mot de passe de l'utilisateur
    public function updatePasswd($id)
    { 
        $data = Password::select(['password'])->where('id', $id)->get();

        return view('updatePassWord', ['currentPasswd' => $data, 'id' => $id]);
    }

    // Récupère toutes les teams auxquelles appartient l'utilisateur
    public function foundTeams()
    { 
        $data = Auth::user()->teams;

        return view('listTeam', ['infoUser' => $data]);
    }

    // Récupère tous les utilisateurs d'une team
    public function foundTeamUsers($id,$name)
    { 
        $dataUsers = Team::find($id)->users;

        return view('listTeamUsers', ['infoUsers' => $dataUsers, 'name' => $name]);
    }
}