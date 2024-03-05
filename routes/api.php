<?php

use App\Http\Controllers\Api\v1\AuthUserApiController;
use App\Http\Controllers\Api\v1\CategoryApiController;
use App\Http\Controllers\Api\v1\EventApiController;
use App\Http\Controllers\Api\v1\EventRequestApiController;
use App\Http\Controllers\Api\v1\SwaggerApiController;
use App\Http\Controllers\Api\v1\SwaggerLoginApiController;
use App\Http\Controllers\Api\v1\UsersApiController;
use App\Http\Controllers\Api\v1\VenueApiController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Public routes with rate limiting
Route::prefix('v1')->group(function () {
    Route::middleware(['throttle:custom'])->group(function () {
        // Authentication routes
        Route::post('/register', [AuthUserApiController::class, 'register']);
        Route::post('/login', [AuthUserApiController::class, 'login']);
    });

    // Authenticated routes
    Route::middleware(['auth:sanctum'])->group(function () {
        // User routes
        Route::post('/logout', [AuthUserApiController::class, 'logout']);
        Route::get('/user', [AuthUserApiController::class, 'getUserDetails']);

        // Admin routes (requires admin role)
        Route::middleware(['admin'])->group(function () {
            // Event routes
            Route::resource('/events', EventApiController::class);
            // Category routes
            Route::resource('/categories', CategoryApiController::class);
            // Venue routes
            Route::resource('/venues', VenueApiController::class);
        });

        // General user routes
        Route::resource('/users', UsersApiController::class)->except(['create', 'edit']);
    });
});

// Swagger/OpenAPI routes
Route::prefix('swagger')->group(function () {
    Route::post('/register', [SwaggerApiController::class, 'register']);
    Route::post('/login', [SwaggerLoginApiController::class, 'login']);
});
