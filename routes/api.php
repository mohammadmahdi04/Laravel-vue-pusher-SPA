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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/question',\App\Http\Controllers\QuestionController::class);
Route::apiResource('/category',\App\Http\Controllers\CategoryController::class);
Route::apiResource('/question/{question}/reply',\App\Http\Controllers\ReplyController::class);
Route::post('/like/{reply}',[\App\Http\Controllers\LikeController::class,'likeIt']);
Route::delete('/like/{reply}',[\App\Http\Controllers\LikeController::class,'unLikeIt']);
Route::post('/user/login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('/user/signup',[\App\Http\Controllers\UserController::class,'signup']);
