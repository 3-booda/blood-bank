<?php

use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;


Route::get('home', function () {
    return view('dashboard.home');
})->name('home');


// Posts
Route::resource('posts', PostController::class);
