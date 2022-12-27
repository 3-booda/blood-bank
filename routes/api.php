<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
});


Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('logout', [AuthController::class, 'logout']);


    // Profile
    Route::get('profile/{user}', [ProfileController::class, 'show']);
    Route::patch('profile/{user}', [ProfileController::class, 'update']);


    // Posts
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/{post}', [PostController::class, 'show']);
    Route::get('favorite-posts', [PostController::class, 'favoritePosts']);
    Route::post('toggle-favorite-post', [PostController::class, 'toggleFavoritePosts']);


    // Donation request
    Route::get('donation-requests', [DonationRequestController::class, 'index']);
    Route::get('donation-requests/{donation_request}', [DonationRequestController::class, 'show']);
    Route::post('donation-requests', [DonationRequestController::class, 'store']);


    // Notifications
    Route::get('notifications', NotificationController::class);
});
