<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PostDetailResource;

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
        // dd($request->file);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (!$validated) {
            return show_response_json(false, "Create post failed!", []);
        }
        $imageName = null;
        // if ($request->file) {
        //     $fileName = ;
        //     $extensions = $request->file;
        //     $imageName = $fileName . '.' . $extensions;
        //     $path = Storage::putFileAs('images', $request->file, $imageName);
        // }
        if ($image = $request->file('file')) {
            $destinationPath = 'images/';
            $imageName = md5(unique_code()) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }

        $post = Post::create([
            'title' => $request->title,
            'image' => $imageName,
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

        $imageName = $request->old_file_name;
        if ($image = $request->file('file')) {
            $destinationPath = 'images/';
            $imageName = md5(unique_code()) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            unlink('images/' . $request->old_file_name);
        }

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'image' => $imageName,
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
        $fileName = $post->image;
        $post->delete();
        unlink('images/' . $fileName);
        return show_response_json(true, "Delete post success!", $fileName);
    }
}
