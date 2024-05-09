<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



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
Route::middleware('api')->group(function () {
    Route::resource('chambres', ChambreController::class);
    });
    Route::middleware('api')->group(function () {
        Route::resource('reservations', ReservationController::class); 
        });
        Route::middleware('api')->group(function () {
            Route::resource('clients', ClientController::class); 
            });
            Route::post('/login', [LoginController::class, 'login']);
            Route::post('/register', [RegisterController::class, 'register']);
            Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);