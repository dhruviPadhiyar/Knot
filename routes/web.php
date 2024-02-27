<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventPricingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/manage', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


    // events
    Route::get('/event/create',[EventController::class,'create'])->name('event.create');
    Route::post('/event/store',[EventController::class,'store'])->name('event.store');
    Route::get('/event/manage',[EventController::class,'manage'])->name('event.manage');
    Route::get('/event/view/{slug}',[EventController::class,'show'])->name('event.show');
    Route::get('/event/edit/{slug}',[EventController::class,'edit'])->name('event.edit');
    Route::get('/event/prizing/add', [EventPricingController::class, 'storeEvent'])->name('event.prizing.add');
    Route::get('/event/prizing/create/{id}',[EventPricingController::class, 'create'])->name('event.prizing.create');

    // venue
    Route::get('/venue/add',[VenueController::class,'create'])->name('venue.create');
    Route::post('/venue/store',[VenueController::class,'store'])->name('venue.store');
    Route::get('/venue/manage',[VenueController::class,'manage'])->name('venue.manage');
    Route::get('/venue/edit/{id}',[VenueController::class,'edit'])->name('venue.edit');
    Route::patch('/venue/update/{id}',[VenueController::class,'update'])->name('venue.update');
    Route::get('/venue/delete/{id}',[VenueController::class,'destroy'])->name('venue.delete');
    Route::get('/mapview/{id}',[VenueController::class,'mapview'])->name('mapview');

    // status
    Route::get('/status/create',[StatusController::class,'create'])->name('status.create');
    Route::post('/status/store',[StatusController::class,'store'])->name('status.store');
    Route::get('/status/manage',[StatusController::class,'manage'])->name('status.manage');
});

require __DIR__ . '/auth.php';
