<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontpage');
});

Route::get('test', function () {
    return env('STORE_URL');
});

//Authentification Routes
Auth::routes();
Route::get('/redirect', 'Auth\SocialAuthFacebookController@redirect');
Route::get('/callback', 'Auth\SocialAuthFacebookController@callback');
Route::get('exit', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('home', function () {
	return redirect('/my');
});

//Profile Routes
Route::prefix('my')->group(function () {
    Route::get('', 'ProfilesController@index');
    Route::get('/edit', 'ProfilesController@edit');
    Route::get('/account', 'ProfilesController@account');
    Route::get('/image', 'ProfilesController@image');
    Route::post('/process_image', 'ProfilesController@process_image');
    Route::post('/update', 'ProfilesController@update');
    Route::get('/settings', 'ProfilesController@settings');
    Route::get('/security', 'ProfilesController@security');
    Route::get('/health', 'ProfilesController@health');
    //Registration GET
    Route::get('/brandnew', 'ProfilesController@brandnew');
    Route::get('/near', 'ProfilesController@near');
    Route::get('/laststep', 'ProfilesController@laststep');
    //Registration POST
    Route::post('/process_brandnew', 'ProfilesController@process_brandnew');
    Route::post('/process_near', 'ProfilesController@process_near');
    Route::post('/process_laststep', 'ProfilesController@process_laststep');
});


//Biomass Routes
Route::resource('biomass', 'Modules\BioMassController');





Route::get('biomass/new', 'Modules\BioMassController@create');
Route::resource('biomass', 'Modules\BioMassController');
Route::post('/biomass/store', 'Modules\BiomassController@store');
Route::get('biomass/json/chart', 'Modules\BioMassController@evchart');

//Tips Routes
Route::prefix('tips')->group(function () {
    Route::get('', 'Modules\TipsController@index');
    Route::get('show', 'Modules\TipsController@show');
    Route::get('create', 'Modules\TipsController@create');
    Route::post('store', 'Modules\TipsController@store');
    Route::get('edit', 'Modules\TipsController@edit');
    Route::post('update', 'Modules\TipsController@update');
    Route::post('delete', 'Modules\TipsController@delete');
});


//Recipes Routes
Route::get('recipes/biomass', 'Tools\RecipeSearchController@bybiomass');
Route::get('recipes/type', 'Tools\RecipeSearchController@bytype');
Route::get('recipes/disease', 'Tools\RecipeSearchController@bydisease');
Route::get('recipes/my', 'Tools\RecipeSearchController@my');
Route::resource('recipe', 'Modules\RecipesController');
Route::post('recipe/addingredient', 'Modules\RecipesController@addingredient');
Route::get('recipes', function(){
    return redirect('recipe');
});


//Diet Routes
Route::get('diet', 'Modules\DietController@index');
Route::get('diet/create', 'Modules\DietController@create');
Route::post('diet/addstep', 'Modules\DietController@addstep');
Route::get('diet/{id}/info', 'Modules\DietController@info');
Route::get('diet/{id}/steps', 'Modules\DietController@steps');
Route::get('diet/{id}', 'Modules\DietController@show');
Route::post('diet/add', 'Modules\DietController@insert');
Route::post('diet/addsteptouser', 'Modules\DietController@addsteptouser');
Route::post('diets/subscribe', 'Modules\DietController@subscribe');


//Posts Routes
Route::resource('posts', 'PostsController');

//Users Routes
Route::resource('users', 'UsersController');

//Disease Routes
Route::resource('diseases', 'DiseasesController');

