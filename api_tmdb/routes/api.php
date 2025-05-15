<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\FavoriteController;

// Listar todos os filmes
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/search', [MovieController::class, 'searchMovie']);
Route::get('/favorite-movie', [FavoriteController::class, 'index']);
Route::post('/favorite-movie/{id}', [FavoriteController::class, 'store']);
Route::delete('/favorite-movie/{id}', [FavoriteController::class, 'destroy']);
