<?php

use App\Http\Controllers\CategoryApiController;
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


Route::get('/users',function(){
    return User::all();

});

Route::get('/category',function(){
    // return Category::all(); // normal way
    return CategoryResource::collection(Category::all()); // works the same as below
    // return CategoryResource::collection(Category::all()); // both works as same.
})->middleware('throttle:category');

Route::get('category/create',[CategoryApiController::class,'create'])->name('create');
