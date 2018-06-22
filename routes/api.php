<?php

use Illuminate\Http\Request;

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

Route::get('/broadcast', function() {
    return 'should broadcast the api';
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'fake'], function() {
    Route::get('/', 'ApiController@fake');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
