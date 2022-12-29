<?php

use App\Http\Controllers\Api\AboutAppController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Support\Facades\Route;


// Constant
define('PAGINATE', 10);


Route::middleware('guest')->group(function () {
    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');


    // Blood types
    Route::get('blood-types', BloodTypeController::class);


    // Provinces
    Route::get('provinces', ProvinceController::class);


    // Cities
    Route::get('cities/{province_id}', CityController::class);


    // Categories
    Route::get('categories', CategoryController::class);

    // Posts
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/{post}', [PostController::class, 'show']);


    // About app
    Route::get('about-app', AboutAppController::class);


    // Contact us
    // Route::get('contact-us', [ContactUsController::class, 'index']);
});


Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('logout', [AuthController::class, 'logout']);


    // Profile
    Route::get('profile/{user}', [ProfileController::class, 'show']);
    Route::patch('profile/{user}', [ProfileController::class, 'update']);


    // Posts
    Route::get('favorite-posts', [PostController::class, 'favoritePosts']);
    Route::post('toggle-favorite-post', [PostController::class, 'toggleFavoritePosts']);


    // Donation request
    Route::get('donation-requests', [DonationRequestController::class, 'index']);
    Route::get('donation-requests/{donation_request}', [DonationRequestController::class, 'show']);
    Route::post('donation-requests', [DonationRequestController::class, 'store']);


    // Notifications
    Route::get('notifications', NotificationController::class);


    // Contact us
    Route::post('contact-us', [ContactUsController::class, 'store']);
});
