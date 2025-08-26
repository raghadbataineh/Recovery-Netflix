<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesApiController;
use App\Http\Controllers\Api\FavoriteApiController;

Route::get('/series', [SeriesApiController::class,'index']);         // GET /api/series
Route::get('/series/{series}', [SeriesApiController::class,'show']); // GET /api/series/{id}

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/favorites', [FavoriteApiController::class,'index']); // GET /api/favorites
    Route::post('/favorites', [FavoriteApiController::class,'store']); // POST /api/favorites
});
