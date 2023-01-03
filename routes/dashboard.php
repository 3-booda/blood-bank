<?php

use Illuminate\Support\Facades\Route;


Route::get('home', function () {
    return view('dashboard.home');
})->middleware('auth:admin');
