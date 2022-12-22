<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;


// constant
define('PAGINATE', 10);


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('logout', [AuthController::class, 'logout']);

    // Posts
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/{post}', [PostController::class, 'show']);
    Route::get('favorite-posts', [PostController::class, 'favoritePosts']);
    Route::post('toggle-favorite-post', [PostController::class, 'toggleFavoritePosts']);
});
