<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['writer:id,fullname,email', 'comments:id,post_id,user_id,content'])->get();
        if (!$posts) {
            return show_response_json(false, "Data not found!", []);;
        }
        return show_response_json(true, "Data found!", PostDetailResource::collection($posts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required'
        ]);
        if (!$validated) {
            return show_response_json(false, "Create post failed!", []);
        }
        $post = Post::create([
            'title' => $request->title,
            'slug' => unique_code() . "-" . Str::slug($request->title),
            'content' => $request->content,
            'author' => $request->author,
        ]);
        // $request["author"] = Auth::user()->id;
        return show_response_json(true, "Create post success!",  new PostDetailResource($post->loadMissing('writer:id,fullname')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with(['writer:id,fullname,email', 'comments:id,post_id,user_id,content'])->where('slug', $slug)->first();
        // $post = Post::findPostBySlug($slug);
        if (!$post) {
            return show_response_json(false, "Data not found!", []);;
        }
        return show_response_json(true, "Data found!", new PostDetailResource($post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'slug' => unique_code() . "-" . Str::slug($request->title),
            'content' => $request->content,
        ]);
        if (!$post) {
            return show_response_json(false, "Update post failed!", []);
        }
        return show_response_json(true, "Update post success!", new PostDetailResource($post->loadMissing('writer:id,fullname')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return show_response_json(true, "Delete post success!", []);
    }
}
