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
Route::get('/users/{name?}',function($name = null){
    return 'Hi KK  '. $name;
})->where ('name','[a-z-Za]+');

Route::get('/products/{id?}',function($id = null){
    return 'Product id is  '. $id;
})->where ('id','[0-9]+');