<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'post_id' => 'required|max:255|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required'
        ]);
        if (!$validated) {
            return show_response_json(false, "Create comment failed!", []);
        }
        $comnt = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'content' => $request->content
        ]);
        // $request["user_id"] = Auth::user()->id;
        return show_response_json(
            true,
            "Create comment success!",
            new CommentResource($comnt->loadMissing(['writer:id,fullname', 'post:id,content']))
        );
    }
    // return show_response_json(true, "Create comment success!", []);


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'user_id' => 'required|max:255|exists:users,id',
            'content' => 'required',
        ]);

        $cmmnt = Comment::findOrFail($id);
        $cmmnt->update([
            'content' => $request->content,
        ]);
        if (!$cmmnt) {
            return show_response_json(false, "Update comment failed!", []);
        }
        return show_response_json(true, "Update comment success!", new CommentResource($cmmnt->loadMissing(['writer:id,fullname', 'post:id,content'])));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cmmnt = Comment::findOrFail($id);
        $cmmnt->delete();
        return show_response_json(true, "Delete comment success!", $cmmnt);
    }
}
