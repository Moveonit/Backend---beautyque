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

Route::group(['namespace' => 'v1'], function() {
    // Controllers Within The "App\Http\Controllers\v1" Namespace
    Route::get('/prova', function () {
        return "Prova";
    });

    Route::post('/changePassword','Auth\JwtAuthenticateController@changePassword');

    Route::post('/signup','Auth\JwtAuthenticateController@signup');

    Route::post('/authenticate','Auth\JwtAuthenticateController@authenticate');

    Route::group(['middleware' => 'jwt.auth'], function ($api) {
        $api->get('me', 'Auth\JwtAuthenticateController@me');
    });

});



