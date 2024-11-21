<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth::sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    ROute::get('/user', [AuthController::class, 'getUser']);
});



Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});