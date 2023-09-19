<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
 
class PostController extends Controller
{

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'mdp' => 'required|string'
        ]);
        
        // Storage::put(time().'.json', json_encode($validated));

        if ($validated) {
  
            // on récupere l'id du user connecté 
            $id = Auth::id();
            // dd($validated->validated()['url']);
            $url = $validated->validated()['url'];
            $mail = $validated->validated()['email'];
            $passwd = $validated->validated()['mdp'];
        
            Password::create(['site' => $url, 'login' => $mail, 'password' => $passwd, 'user_id' => $id]);
            // $file = json_encode($validated->validated());
            // Storage::put(time().'.json', $file); 
        
            return redirect("/");
          }

        // The blog post is valid...
        return redirect(route('landing'));
    }
  
    
}