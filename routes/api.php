<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/get/{userId}',[\App\Http\Controllers\Api\UsersController::class, 'get'])->name('api.users.get');
Route::post('users/store',[\App\Http\Controllers\Api\UsersController::class, 'store'])->name('api.users.store');

Route::get('posts/get/{userId}',[\App\Http\Controllers\Api\PostsController::class, 'get'])->name('api.posts.get');
Route::post('posts/store',[\App\Http\Controllers\Api\PostsController::class, 'store'])->name('api.posts.store');
