<?php

use App\Http\Controllers\WebAPI\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/post", [PostController::class, "index"]);
Route::post("/post", [PostController::class, "store"]);
Route::get("/post/{id}", [PostController::class, "show"]);
Route::put("/post/{id}", [PostController::class, "update"]);
Route::delete("/post/{id}", [PostController::class, "destroy"]);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');