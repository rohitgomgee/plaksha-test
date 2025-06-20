<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Public routes
Route::get('/', [JobListingController::class, 'index'])->name('home');
