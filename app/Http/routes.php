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
    return view('login');
});
Route::post('/social','LoginController@socialLogin');
// Route::get('/token', function () {
//     return view('token');
// });
Route::post('login', 'APILoginController@login');
Route::get('login', 'APILoginController@index');
Route::post('logout', 'APILoginController@logout');
//Route::post('refresh', 'APILoginController@refresh');
Route::post('token', 'APILoginController@token');