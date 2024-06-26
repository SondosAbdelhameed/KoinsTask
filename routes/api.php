<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IntervalController;

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

Route::prefix('auth')->group(function () {

    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);

    Route::middleware('jwt')->group(function () {
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::get('me', [AuthController::class,'me']);

    });
});

Route::middleware('jwt')->group(function () {
    Route::post('set-interval',[IntervalController::class,'setInterval']);
    //Route::get('books',IntervalController::class);
});
