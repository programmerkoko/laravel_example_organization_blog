<?php

namespace App\Http\Controllers\WebAPI;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //building API for post view

$post = Post::all()        ;

return response()->json($post);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // storing resources API data

$validater = $request->validate([
    "writer"=>"required|max:255",
    "title"=>"required|max:255",
    "content"=>"required",
    "user_id"=>"required"
]);

$post = Post::create($validater);
return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //show post detail api building

$post = Post::findOrFail($id);

if(!$post) {

    return response()->json(["message"=>"Post not found"], 404);
}

return response()->json($post);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //building update post api

$post = Post::findOrFail($id);

if(!$post) {

    return response()->json(["message"=>"couldn't find post"], 404);

}

$validater = $request->validate([
"writer"=>"required|max:255",
"title"=>"required|max:255",
"content"=>"required",
"user_id"=>"required"
]);

$post->update($validater);

return response($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //building delete post request api

$post = Post::findOrFail($id);

if(!$post) {

    return response()->json(["message"=>"You can not delete this post"], 404);

}

$post->delete();

    }
}
