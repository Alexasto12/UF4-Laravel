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
Route::get('/autor/{id}/imatge', [ApiController::class, 'getAutorImatge']);

Route::get('/autor/{id}/imatgeFitxer', [ApiController::class, 'getAutorImatgeFitxer']);

// PUT (UPDATE)

Route::post('autor/{id}', [ApiController::class, 'updateLlibre']);

// POST (CREATE)
Route::post('/autor', [ApiController::class, 'createAutor']);

// DELETE
Route::delete('autor/{id}', [ApiController::class, 'deleteAutor']);


// Biblioteca
// GET
Route::get('/biblioteca', [ApiController::class, 'getBiblioteca']);
Route::get('/biblioteca/{id}', [ApiController::class, 'getBiblioteca']);

// PUT (UPDATE)
Route::put('biblioteca/{id}', [ApiController::class, 'updateBiblioteca']);

// POST (CREATE)
Route::post('biblioteca', [ApiController::class, 'createBiblioteca']);

// DELETE
Route::delete('biblioteca/{id}', [ApiController::class, 'deleteBiblioteca']);


// Biblioteca_Llibre

// GET

Route::get('biblioteca-llibre/add/{idBiblioteca}/{idLlibre}', [ApiController::class, 'addLlibreToBiblioteca']);
Route::get('biblioteques/cerca-per-llibre/{idLlibre}', [ApiController::class, 'getBibliotecasFromLlibre']);
// DELETE

Route::delete('biblioteca-llibre/remove/{idBiblioteca}/{idLlibre}', [ApiController::class, 'removeLlibreFromBiblioteca']);