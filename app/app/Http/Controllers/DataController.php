<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function found()
    { 
        $data = Password::select(['site', 'login', 'password', 'id'])->where('user_id', Auth::id())->get();

        return view('listPassWord', ['infoUser' => $data]);
    }

    public function updatePasswd($id)
    { 
        $data = Password::select(['password'])->where('id', $id)->get();

        return view('updatePassWord', ['currentPasswd' => $data, 'id' => $id]);
    }
}