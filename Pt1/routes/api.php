<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// LLibres
// GET
Route::get('/llibres', [ApiController::class, 'getLlibres']);

Route::get('/llibre/{id}', [ApiController::class, 'getLlibre']);

// PUT (UPDATE)
Route::put('llibre/{id}', [ApiController::class, 'updateLlibre']);
// POST (CREATE)
Route::post('llibre', [ApiController::class, 'createLlibre']);

// DELETE
Route::delete('llibre/{id}', [ApiController::class, 'deleteLlibre']);



// Autors
// GET
Route::get('/autors', [ApiController::class, 'getAutors']);

Route::get('/autor/{id}', [ApiController::class, 'getAutor']);

// PUT (UPDATE)

Route::put('autor/{id}', [ApiController::class, 'updateLlibre']);

// POST (CREATE)
Route::post('autor', [ApiController::class, 'createAutor']);

// DELETE
Route::delete('autor/{id}', [ApiController::class, 'deleteAutor']);
