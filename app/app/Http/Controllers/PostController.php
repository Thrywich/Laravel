<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
 
class PostController extends Controller
{
 
    /**
     * Store a new blog post.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'mdp' => 'required|string|password',
        ]);
     
        // The blog post is valid...
        return redirect("{{ route('landing') }}");
    }
}