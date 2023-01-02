<?php

use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    return Auth()->user();
});

Route::get('home', function () {
    return view('dashboard.home');
});
