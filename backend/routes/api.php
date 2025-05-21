<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, PlaceController, WishlistController, UserController};

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function() {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('places', PlaceController::class)->only(['index', 'store']);
    Route::apiResource('users', UserController::class)->only(['index']);
    Route::apiResource('wishlists', WishlistController::class)->only(['index', 'store']);
    Route::get('users/{user}/wishlists', [WishlistController::class, 'userWishlists']);
});
