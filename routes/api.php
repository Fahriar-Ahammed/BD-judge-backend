<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProblemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::prefix('problem')->group(function () {
        Route::get('all',[ProblemsController::class,'index']);
        Route::get('view/{id}',[ProblemsController::class,'show']);
    });

    Route::group(['middleware' => 'admin'], function ($router) {
        Route::prefix('problems')->group(function () {
            Route::get('all',[ProblemsController::class,'index']);
            Route::post('create',[ProblemsController::class,'create']);
            Route::get('view/{id}',[ProblemsController::class,'view']);
            Route::post('update',[ProblemsController::class,'update']);
            Route::get('delete/{id}',[ProblemsController::class,'delete']);
        });
    });
});


