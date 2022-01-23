<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('games')->group(function(){
    Route::get('/', [GameController::class, 'index']);
    Route::post('/', [GameController::class, 'store']);
    Route::get('/{game}', [GameController::class, 'show']);
    Route::put('/{game}', [GameController::class, 'update']);
    Route::delete('/{game}/delete', [GameController::class, 'destroy']);
});

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

/*
|--------------------------------------------------------------------------
| Protected API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('games')->middleware(['auth:sanctum'])->group(function(){
});
