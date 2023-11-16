<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DrugController;

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

Route::get ('/drugs', [DrugController::class, 'index']);
Route::post ('/drugs', [DrugController::class, 'store']);
Route::get ('/drugs/{id}', [DrugController::class, 'show']);
Route::get ('/drugs/{id}/edit', [DrugController::class, 'edit']);
Route::put ('/drugs/{id}', [DrugController::class, 'update']);
Route::delete ('/drugs/{id}', [DrugController::class, 'destroy']);
