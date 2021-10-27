<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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




// _____________Public route____________ //

// users
Route::post('users', [UserController::class, 'register']);
Route::post('users', [UserController::class, 'login']);


// posts
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);


// _____________Private route____________ //
Route::group(['middleware' => ['auth:sanctum']], function(){
    // User
    Route::post('users', [UserController::class, 'logout']);

    // Post
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts', [PostController::class, 'update']);
    Route::delete('posts', [PostController::class, 'destroy']);
});





