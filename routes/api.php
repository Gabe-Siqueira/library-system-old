<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::post('login/user', [AuthController::class, 'login']);
Route::group(['middleware' => ['jwt.auth']], function(){
    // AuthController
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // BookController
    Route::get('book', [BookController::class, 'index']);
    Route::post('book', [BookController::class, 'store']);
    Route::get('book/{id}', [BookController::class, 'show']);
    Route::put('book/{id}', [BookController::class, 'update']);
    Route::delete('book/{id}', [BookController::class, 'destroy']);

    // UserController
    Route::get('user', [UserController::class, 'index']);
    Route::post('user', [UserController::class, 'store']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);


    // MenusController
    // Route::get('menus', [MenusController::class, 'index']);
    // Route::post('menus', [MenusController::class, 'store']);
    // Route::get('menus/{id}', [MenusController::class, 'show']);
    // Route::put('menus/{id}', [MenusController::class, 'update']);
    // Route::delete('menus/{id}', [MenusController::class, 'destroy']);

});
