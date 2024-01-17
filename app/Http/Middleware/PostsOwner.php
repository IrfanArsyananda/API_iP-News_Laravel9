<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function App\Http\Controllers\show_response_json;

class PostsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $currentUserId = Auth::user()->id; // User by token laravel
        $currentUserId = $request->author; // User by request body
        $currentPostId = Post::findOrFail($request->id); // Post by id parameter
        if ($currentPostId->author != $currentUserId) {
            return show_response_json(false, "Post isn't yours!", ["post_user" => $currentPostId->author, "id_user" => $currentUserId]);
        }
        // return show_response_json(true, "Post is yours!", []);

        return $next($request);
    }
}
