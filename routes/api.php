<?php
use Illuminate\Http\Request;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::get('movies','MoviesController@index');
 Route::post('movies','MoviesController@store');
 Route::get('movies/{id}','MoviesController@show');
 Route::delete('movies/{id}','MoviesController@destroy');
 Route::put('movies/{id}','MoviesController@update');
//Route::resource('movies','MoviesController');