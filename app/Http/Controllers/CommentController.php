<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct() {

    $this->middleware("auth");
}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validater = $request->validate([
            "post_id"=>"required",
            "user_id"=>"required",
            "feedback"=>"required"
        ]);

        $comment = new Comment();
        $comment->post_id=$request->input("post_id");
        $comment->user_id=$request->input("user_id");
        $comment->feedback=$request->input("feedback");

        $comment->save();
        return back()->with("info", "Thank for your feedback");

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.





    /**
     * Edit the specified resource in storage.
     */
    public function edit(Request $request, $id)
    {
        //
        $post = Comment::findOrFail($id);

        return view("Comments.CommentEdit", ["edit"=>$post]);

    }


    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        "feedback" => "required|string|max:500", // Use "feedback" to match the input field in the form
        "post_id" => "required|integer|exists:posts,id", // Ensure post_id exists in the posts table
        "user_id" => "required|integer|exists:users,id", // Ensure user_id exists in the users table
    ]);

    // Find the comment by ID or throw a 404 error
    $comment = Comment::findOrFail($id);

    // Update the comment attributes
    $comment->feedback = $request->input("feedback");
    $comment->post_id = $request->input("post_id");
    $comment->user_id = $request->input("user_id");
    $comment->save(); // Use save() instead of update() for better readability

    // Redirect to the details page with a success message
    return redirect("/details/" . $comment->post_id)
        ->with("info", "Comment updated successfully!");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

$comment = Comment::findOrFail($id);
        $this->authorize("delete", $comment);
        $comment->delete();
        return back()->with("info", "Comment deleted successfully.");

    }
}