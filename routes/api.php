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

############################# Main category #################################33
Route::group(['middleware'=>['api','checkPassword','checkLanguage'] , 'namespace'=>'api'], function (){
    Route::post('get-main-categories','mainCategoriesController@index');
    Route::post('get-category','mainCategoriesController@getOneCategory');
    Route::post('change-category-status','mainCategoriesController@changeCategoryStatus');
});
Route::group(['middleware'=>['api','checkPassword','checkLanguage','checkAdminToken:admin-api'] , 'namespace'=>'api'], function (){
    Route::get('offers','mainCategoriesController@offers');
});
