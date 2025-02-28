<?php

use Illuminate\Support\Facades\Route;

Route::get('ping', function () {
    return response()->json(['pong' => true],200);
});
Route::post('login',[\App\Http\Controllers\API\AuthController::class,'login'])->middleware('throttle:5,1');
Route::post('register',[\App\Http\Controllers\API\AuthController::class,'register']);
Route::prefix('v1')->name('v1.')->group(function () {
    Route::prefix('articles')
        ->name('articles.')
        ->controller(\App\Http\Controllers\API\ArticleController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::
                middleware('auth:api')
                ->group(function () {
                    Route::get('store', 'store')->name('store');
                });
        });
});



