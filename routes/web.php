<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', [JobListingController::class, 'index'])->name('home');

Route::get('/careers/{slug}', [JobListingController::class, 'show'])->name('jobs.show');

// Admin routes (protected by auth and custom admin middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/careers', [JobListingController::class, 'adminIndex'])->name('jobs.index');
    Route::get('/careers/create', [JobListingController::class, 'create'])->name('jobs.create');
});
