<?php

use Illuminate\Support\Facades\Route;



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



