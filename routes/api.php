<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::group(['prefix' => 'oauth'], function () {
    Route::post('token', 'Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('tokens', 'Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser');
        Route::delete('tokens/{token_id}', 'Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');
    });
});


Route::apiResource('products', ProductController::class);
