<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class PostController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'mdp' => 'required|string'
        ]);
        
        Storage::put(time().now().'.json', json_encode($validated));


        // The blog post is valid...
        return redirect(route('landing'));
    }
}