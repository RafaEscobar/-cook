<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostSavedController;
use App\Http\Controllers\PostShareController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\TopUserController;
use App\Http\Controllers\UserController;
use App\Http\Requests\Store\PostCommentRequest;
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
    Route::apiResource('/user/save-post', PostSavedController::class)->only(['store', 'destroy', 'index']);
    Route::apiResource('/user/comment-post', PostCommentController::class)->only(['store', 'destroy', 'index']);
    Route::apiResource('user/share-post', PostShareController::class)->only(['store', 'destroy']);
    Route::apiResource('/user/like-post', PostLikeController::class)->only(['store', 'destroy']);
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});