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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(
    ['middleware' => ['cors'], 'prefix' => 'auth']
, function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::group(['middleware' => ['auth:api']], function() {
        Route::get('logout', 'App\Http\Controllers\Api\AuthController@logout');
    });
});

Route::group([
    'prefix' => 'app'
], function () {
    Route::group(
      ['middleware' => ['auth:api', 'cors']
    ], function() {
        Route::get('getproject/{id}', 'App\Http\Controllers\Api\ProjectController@getproject');
    });
});
