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

//registering the users
Route::post('/register', 'API\mAuthController@register');
Route::post('/login', 'API\mAuthController@login');

//only for authenticated users
Route::group(['middleware' => 'auth:api'],function(){
    Route::get('/users', 'API\mAuthController@index');
    Route::get('/users/{id}', 'API\mAuthController@show');
    Route::patch('/update_user/{id}', 'API\mAuthController@update');
    Route::delete('/delete_user/{id}', 'API\mAuthController@destroy');
});


//other api endpoints
Route::apiResource('/vaccines', 'API\VaccinesController')
    ->middleware('auth:api');
Route::apiResource('/vaccine_used', 'API\UsagesController');
//    ->middleware('auth');
