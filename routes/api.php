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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('hello', 'MainController@index');
Route::post('login', 'MainController@login');
Route::post('register', 'MainController@register');

//the middleware is provide by the passport package and i need it in order to find the user that is logged in
Route::get('user', 'MainController@user')->middleware('auth:api');

