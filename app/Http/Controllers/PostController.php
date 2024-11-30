<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware("auth")->except("show", "details");
    }

    public function index()
    {

        return view("home");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("Posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validater = $request->validate([
            "writer" => "required",
            "title" => "required",
            "content" => "required",
"user_id" => "required"
        ]);

        $post = new Post();

        $post->writer = $request->input("writer");
        $post->title = $request->input("title");
        $post->content = $request->input("content");
        $post->user_id=$request->input("user_id");
        $post->save();

        return redirect("/view")->with("info", "uploaded one post");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $show = Post::latest()->paginate(5);

        return view("Posts.show", ["data" => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $id)
    {

        $edit = Post::findOrFail($id);

        $this->authorize('update', $edit);




        return view("Posts.update", ["data" => $edit]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validater = $request->validate([
            "writer" => "required",
            "title" => "required",
            "content" => "required",
            "user_id"=>"required"
        ]);

        $post = Post::findOrFail($id);
        $this->authorize('update', $post);






        $post->update($request->all());

        return redirect("/view");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $id)
    {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect("/view")->with("info", "one post deleted successfully");
    }

    public function details($id)
    {

        $see = Post::with('comments.user')->findOrFail($id);

        return view("Posts.Details", ["data" => $see]);
    }

}