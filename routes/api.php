<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\TopUserController;
use App\Http\Controllers\UserActionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/users', UserController::class)->only(['update', 'show', 'destroy']);
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/recipes', RecipeController::class);
    Route::get('top-users', TopUserController::class);
    Route::controller(FollowerController::class)->group(function(){
        Route::post('/user/follow', 'follow');
        Route::post('/user/unfollow', 'unfollow');
        Route::get('/user/followers', 'followers');
        Route::get('/user/followed', 'usersFollowed');
    });
    Route::controller(UserActionsController::class)->group(function(){
        Route::post('/user/save-post', 'savePost');
        Route::post('/user/delete-post', 'deletePost');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});