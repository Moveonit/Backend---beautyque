<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers\v1'], function ($api) {

        $api->get('refresh','Auth\JwtAuthenticateController@refresh');

        $api->post('signup','Auth\JwtAuthenticateController@signup');

        $api->post('login','Auth\JwtAuthenticateController@authenticate');

        $api->get('checkemail/{email}','UserController@checkemail');

        $api->get('/prova', function () {
            return "Prova";
        });

        $api->group(['middleware' => 'jwt.auth',], function ($api) {

            $api->get('me', 'UserController@me');

            $api->resource('users', 'UserController',['only' => ['store']]);

            $api->resource('spas', 'SpaController',['only' => ['index','show', 'store', 'update']]);

            $api->resource('treatments', 'TreatmentController',['only' => ['index','show', 'store', 'update']]);

            $api->resource('treatmentcategories', 'TreatmentCategoryController',['only' => ['index','show', 'store', 'update']]);

            $api->get('treatmentcategories/{id}/treatments', 'TreatmentCategoryController@getTreatments');

            $api->resource('employees', 'EmployeeController',['only' => ['index','show', 'store', 'update']]);

            $api->resource('guests', 'GuestController',['only' => ['index', 'store', 'update']]);

            $api->post('changePassword','Auth\JwtAuthenticateController@changePassword');
        });
    });
});
//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::group(['namespace' => 'v1'], function() {
    // Controllers Within The "App\Http\Controllers\v1" Namespace
    Route::get('/prova', function () {
        return "Prova";
    });

    Route::post('/changePassword','Auth\JwtAuthenticateController@changePassword');

    Route::post('/signup','Auth\JwtAuthenticateController@signup');

    Route::post('/login','Auth\JwtAuthenticateController@authenticate');

    Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');

    Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');

    Route::group(['middleware' => 'jwt.refresh'], function ($api) {
        $api->get('refresh', 'Auth\JwtAuthenticateController@refresh');
    });

    Route::group(['middleware' => 'jwt.auth'], function ($api) {
        $api->get('me', 'Auth\JwtAuthenticateController@me');
    });

});

*/



