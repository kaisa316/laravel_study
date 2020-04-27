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

####################以下为 自己添加 ########################
//validate 验证
Route::post('simple_check','ValidateController@simple_check') ;
Route::get('complex_check','ValidateController@complex_check') ;
Route::get('obj_check','ValidateController@obj_check') ;