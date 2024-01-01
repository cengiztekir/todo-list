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

Route::prefix('admin')->group(function () {
    Route::post('/auth/login', [\App\Http\Controllers\Auth\LoginController::class, '__invoke']);

    // auth:sanctum middleware'i sadece giriş yapmış kullanıcılar için
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('developers')->group(function () {
            Route::get('/with/todos', \App\Http\Controllers\Developer\IndexWithTodosController::class);
        });
    });
});

