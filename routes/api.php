<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/sewas', [SewaController::class, 'index']);
    Route::post('/sewas', [SewaController::class, 'store']);
    Route::put('/sewas', [SewaController::class, 'store']);
    Route::get('/sewas/{id}', [SewaController::class, 'show']);

    Route::get('/mobils', [MobilController::class, 'index']);
    Route::post('/mobils', [MobilController::class, 'store']);
    Route::put('/mobils/{id}', [MobilController::class, 'update']);
    Route::delete('/mobils/{id}', [MobilController::class, 'destroy']);
    Route::get('/mobils/{id}', [MobilController::class, 'show']);
});

