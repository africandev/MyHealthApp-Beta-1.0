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

Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user = $request->user();

    return response()->json([
        'id' => $user->id,
        'name' => $user->lastname,
        'email' => $user->email,
    ]);
});

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
});

Route::get('recipes', 'Api\RecipesController@index');
Route::get('recipes/show/{id}', 'Api\RecipesController@show');

//biomass Routes
Route::post('biomass', 'Api\BioMassController@index');
Route::post('biomass/new', 'Api\BioMassController@store')->middleware('auth:api');;
Route::post('biomass/show/{id}', 'Api\BioMassController@show');
Route::post('biomass/edit/{id}', 'Api\BioMassController@edit');
Route::post('biomass/delete/{id}', 'Api\BioMassController@destroy');
//
