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


Route::prefix('v1')->group(function () {
    //  routes
    Route::resource('/categories', CategoryApiController::class);
    Route::resource('/events', EventApiController::class);
    Route::resource('/users', UsersApiController::class);
    Route::resource('/venues', VenueApiController::class);

    Route::post('/register', [AuthUserApiController::class, 'register']);
    Route::post('/login', [AuthUserApiController::class, 'login']);
    Route::post('/logout', [AuthUserApiController::class, 'logout'])->middleware('auth:sanctum');
});

Route::post('/register', [SwaggerApiController::class, 'register']);
Route::post('/login', [SwaggerLoginApiController::class, 'login']);
Route::get('/user', [SwaggerApiController::class, 'getUserDetails'])->middleware('auth:sanctum');
