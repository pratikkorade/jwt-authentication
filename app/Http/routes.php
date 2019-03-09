<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/token', function () {
//     return view('token');
// });
Route::post('login', 'APILoginController@login');
Route::get('login', 'APILoginController@index');
Route::get('logout', 'APILoginController@logout');
Route::post('refresh', 'APILoginController@refresh');
Route::post('me', ['before' => 'jwt-auth', function() {

    $user = JWTAuth::parseToken()->toUser();

    return Response::json(compact('user'));
}]);
Route::post('token', 'APILoginController@token');