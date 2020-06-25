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

Route::apiResource('brands', 'BrandController');
Route::get('brands/{id}/products', 'BrandController@productFromBrand');
Route::get('products', 'productController@index');
Route::get('products/{id}', 'productController@getOne');
Route::get('news', 'newsController@index');
Route::get('news/{id}', 'newsController@getOne');
Route::post('contact', 'newsController@send');
