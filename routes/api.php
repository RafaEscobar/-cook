<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\Posts\PostCategoryController;
use App\Http\Controllers\Posts\PostCommentController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Posts\PostLikeController;
use App\Http\Controllers\Posts\PostSaveController;
use App\Http\Controllers\Posts\PostShareController;
use App\Http\Controllers\Recipes\RecipeController;
use App\Http\Controllers\Recipes\RecipeSaveController;
use App\Http\Controllers\Recipes\RecipeShareController;
use App\Http\Controllers\TopUserController;
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
    Route::apiResource('/user/save-post', PostSaveController::class)->only(['store', 'destroy', 'index']);
    Route::apiResource('/user/comment-post', PostCommentController::class)->only(['store', 'destroy', 'index']);
    Route::apiResource('user/share-post', PostShareController::class)->only(['store', 'destroy']);
    Route::apiResource('/user/like-post', PostLikeController::class)->only(['store', 'destroy']);
    Route::apiResource('/post-category', PostCategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::apiResource('/user/save-recipe', RecipeSaveController::class)->only(['index', 'store', 'destroy']);
    Route::apiResource('user/share-recipe', RecipeShareController::class)->only(['index', 'store', 'destroy']);
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});