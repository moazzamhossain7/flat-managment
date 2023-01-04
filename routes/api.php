<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AppInitController;


Route::group(['namespace' => 'API'], function () {
    // Route::get('/products', [ProductController::class, 'index']);
    // Route::apiResource('/stocks', StockController::class);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Route::get('/user', LotController::class);
    });
});
