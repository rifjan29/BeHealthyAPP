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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('list-type', 'API\ContentController@allType');
    Route::get('list-meditasi', 'API\ContentController@allMeditasi');
    Route::get('list-yoga', 'API\ContentController@allYoga');
    Route::get('list-olahraga', 'API\ContentController@allOlahraga');
    Route::post('register-android', 'API\ContentController@registerAndroid');
// });
Route::get('login', 'API\AuthController@login');

// Route::group(['middleware => auth:sanctum'],function(){
//     Route::get('list-type', 'API\ContentController@allType');
// });