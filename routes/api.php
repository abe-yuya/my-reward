<?php

use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/register', [RegisterController::class, 'register'])->name('user.register');

Route::group(['middleware' => ['auth:sanctum']], function() {
    // ユーザープロフィール系
    Route::get('/show/{user_id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/update/{user_id}', [UserController::class, 'update'])->name('user.update');
});
