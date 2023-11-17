<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
Route::get('/news', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
Route::get('/news/search/{title}', [NewsController::class, 'search']);
Route::get('/news/category/automotive', [NewsController::class, 'automotive']);
Route::get('/news/category/finance', [NewsController::class, 'finance']);
Route::get('/news/category/sport', [NewsController::class, 'sport']);


# Route new
# Method GET
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);

# Method POST
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
