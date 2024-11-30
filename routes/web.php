<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return redirect("/view");

});
Route::get("/create", [PostController::class, "store"])->name("create");
Route::post("/create", [PostController::class, "store"])->name("create");
Route::get("/view", [PostController::class, "show"])->name("view");
Route::delete("/delete/{id}", [PostController::class, "destroy"])->name("delete");
Route::get("/delete/{id}", [PostController::class, "destroy"])->name("delete");
Route::get("/edit/{id}", [PostController::class, "edit"])->name("edit");
Route::put("/update/{id}", [PostController::class, "update"])->name("update");
Route::get("/details/{id}", [PostController::class, "details"])->name("details");
Route::get("/add", [PostController::class, "create"])->name("add");


Route::post("/addcomment", [CommentController::class, "store"])->name("addcomment");
Route::get("/editcomment/{id}", [CommentController::class, "edit"])->name("editcomment");
Route::post("/commentupdate/{id}", [CommentController::class, "update"])->name("commentupdate");
Route::put("/commentupdate/{id}", [CommentController::class, "update"])->name("commentupdate");
Route::get("/commentupdate/{id}", [CommentController::class, "update"])->name("commentupdate");
Route::delete("/deletecomment/{id}", [CommentController::class, "destroy"])->name("deletecomment");
Route::get("/deletecomment/{id}", [CommentController::class, "destroy"])->name("deletecomment");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');