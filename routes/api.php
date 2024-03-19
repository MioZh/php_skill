<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;



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

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login']);

Route::get('/showUser/{id}', [UserController::class, 'show']);

Route::post('/updateUser/{id}', [UserController::class, 'update']);

Route::post('/updateImage/{id}', [ImageController::class, 'store']);

Route::get('showImage/{id}', [ImageController::class, 'getUserImage']);

Route::get('createImage/', [ImageController::class, 'create']);
