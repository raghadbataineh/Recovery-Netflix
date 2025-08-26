<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;


// These routes are accessible to all users for the homepage and series details
Route::get('/', [HomepageController::class,'index'])->name('home');
Route::get('/series/{id}', [HomepageController::class, 'show'])->name('home.show');
Route::get('/category/{id}', [HomepageController::class, 'byCategory'])->name('front.series.byCategory');
Route::get('/episode/{id}', [HomepageController::class, 'showEpisode'])->name('front.episode.show');


// AUTH ROUTES
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






//     Route::resource('/admin/series', SeriesController::class)->names('admin.series');
//     Route::resource('/admin/episodes', EpisodController::class)->names('admin.episodes');
// Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
// Route::resource('/admin/users', AuthController::class)->names('admin.users');


// only admin can manage users
Route::resource('/admin/users', AuthController::class)
    ->names('admin.users')
    ->middleware(['auth', 'role:admin']); 

// ADMIN PANEL (Series / Episodes / Categories)
Route::middleware(['auth'])->group(function () {

    // Series protection with policies
    Route::resource('/admin/series', SeriesController::class)
        ->names('admin.series')
        ->middleware('can:viewAny,App\Models\Series');

    // Episodes protection with policies
    Route::resource('/admin/episodes', EpisodController::class)
        ->names('admin.episodes')
        ->middleware('can:viewAny,App\Models\Episode');

    // Categories for admin and employee 
    Route::resource('/admin/categories', CategoryController::class)
        ->names('admin.categories');
});


