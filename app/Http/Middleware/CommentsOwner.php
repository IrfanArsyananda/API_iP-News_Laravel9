<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;
use function App\Http\Controllers\show_response_json;

class CommentsOwner
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
        $currentUserId = $request->user_id; // User by request body
        $currentCommentId = Comment::findOrFail($request->id); // Post by id parameter
        if ($currentCommentId->user_id != $currentUserId) {
            return show_response_json(false, "Comment isn't yours!", []);
        }
        return $next($request);
    }
}
