<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(
    ['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'],
    function () {
        Route::apiResource('dishes', DishController::class);
        Route::apiResource('restaurants', RestaurantController::class);

        Route::post('dishes/bulk', ['uses' => 'DishController@bulkStore']);
    });
