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

Route::post('login', 'api\UserController@login');
Route::post('register', 'api\UserController@register');
Route::get('getGeneralResources', 'api\UserController@get_general_resources');
Route::get("getMatchResources", "api\UserController@get_match_resources");
Route::post('checkValidUserName','api\UserController@check_valid_username');
Route::post("checkValidEmail", "api\UserController@check_valid_email");
Route::post("updateUserSetting", "api\UserController@update_user_setting");
Route::get("getMatches/{user_id}", "api\UserController@get_matches");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
