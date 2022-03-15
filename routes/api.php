<?php

use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth')->group(function () {
    // ユーザープロフィール系
    Route::get('/show/{user_id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/update/{user_id}', [UserController::class, 'update'])->name('user.update');
});
