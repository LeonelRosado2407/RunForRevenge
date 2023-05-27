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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {

    //Route::put('/login','ApiloginController@login');
});
Route::get('/registro','ApiController@registro');



Route::get('/record','ApiController@record');
Route::get('/recordg','ApiController@recordg');
Route::put('/record_amigos','ApiController@record_amigos');
Route::put('/recordmi','ApiController@recordm'); 


Route::put('/recibir','ApiController@recibir');

Route::put('/prueba','ApiController@prueba');

Route::put('/partida','ApiController@partida');


//login de prueba 

//Route::post('login','Auth\ApiloginController@login');

//Route::put('/login','ApiController@login');


Route::put('/save_estado','ApiController@save_estado');
Route::put('/delete_estado','ApiController@delete_estado');
Route::put('/get_estado','ApiController@get_estado');
Route::put('/get_monedas','ApiController@get_monedas');

/*
Route::controller(AuthapiController::class)->group(function(){
    Route::put('login','login');
    Route::put('register','register');

});
*/

//Route::put('/register','ApiloginController@register');


//Route::put('/login','ApiloginController@login');

Route::put('login','ApiloginController@login');
Route::put('registro','ApiregisterController@register');







