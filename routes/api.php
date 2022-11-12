<?php

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
Route::get('user-list','Api\UserController@index'); 
Route::post('store-user','Api\UserController@store')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('role-list','Api\RoleController@index'); 
