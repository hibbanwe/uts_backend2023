<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


# Route new
Route::get('/new', [NewController::class, 'index']);
Route::post('/new', [NewController::class, 'store']);
Route::put('/new/{id}', [NewController::class, 'update']);
Route::delete('/new/{id}', [NewController::class, 'destroy']);

# Route new
# Method GET
Route::get('/new', [NewController::class, 'index']);
Route::get('/new/{id}', [NewController::class, 'show']);

# Method POST
Route::post('/new', [NewController::class, 'store']);
Route::put('/new/{id}', [NewController::class, 'update']);
Route::delete('/new/{id}', [NewController::class, 'destroy']);
