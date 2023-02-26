<?php

use App\Http\Controllers\JsonController;
use App\Http\Middleware\CheckAuthor;
use App\Http\Middleware\CheckToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => CheckToken::class, 'prefix' => 'form'], function() {
    Route::any('store/submit', [JsonController::class, 'store']);
    Route::middleware(CheckAuthor::class)->any('update/submit', [JsonController::class, 'update']);
});