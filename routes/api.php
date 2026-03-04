<?php

use App\Http\Controllers\Api\PlantController;
use App\Http\Controllers\Api\RecommendationController;
use Illuminate\Support\Facades\Route;

Route::get('/plants', [PlantController::class, 'index']);
Route::get('/plants/{plant}', [PlantController::class, 'show']);
Route::post('/recommendation', [RecommendationController::class, 'store']);
