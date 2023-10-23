<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

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

// Public accessible API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated only API
// We use auth api here as a middleware so only authenticated user who can access the endpoint
// We use group so we can apply middleware auth api to all the routes within the group
Route::middleware('auth:api')->group(function() {
    
    Route::get('/me', [UserController::class, 'me']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/users/{user_id}/follow', [UserController::class, 'follow']);
    Route::delete('/users/{user_id}/unfollow', [UserController::class, 'unfollow']);
    Route::get("/user/{user_id}", [UserController::class, 'getUser']);
    Route::post("/user/{user_id}/profile_picture", [UserController::class, 'updateProfilePhoto']);
    // TODO: Last 10 Activities(Follow, Like, Post, Comment)
    // TODO: COMMENTS CRUD

    

    // crud for user's posts
    Route::post('/posts', [PostController::class,'createPost']);
    Route::get('/posts', [PostController::class,'getNewsFeed']); // TODO
    Route::get('/posts/{post_id}', [PostController::class,'getPost']);
    Route::put('/posts/{post_id}', [PostController::class,'updatePost']);
    Route::delete('/posts/{post_id}', [PostController::class,'deletePost']);
    Route::get('/user/{user_id}/posts', [PostController::class,'getUserPosts']);
    Route::post('/posts/{post_id}/like', [PostController::class,'likePost']);
    Route::delete('/posts/{post_id}/like', [PostController::class,'unlikePost']);
    




    




    
});

/* made
authorization with JWT
posts
like posts
media for posts(1 photo file)
change profile pic

follow user
unfollow user

log middleware
simple frontend
*/