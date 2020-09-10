<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','Shop\GoodsController@create');
Route::post('/shop/add','Shop\GoodsController@add');
//商品展示
Route::get("/goods/create","GoodsController@create");
Route::get("/goods","GoodsController@goods");
Route::post("/goods/store","GoodsController@store");
Route::post("/goods/updatenum","GoodsController@updatenum");

Route::get("/goods/delete/{id}","GoodsController@delete");
Route::post("/goods/update/{id}","GoodsController@update");
Route::get("/goods/upd/{id}","GoodsController@upd");
Route::get('/', function () {
    return view('welcome');
});
//测试
Route::get("/test",function(){
	return view("test");
});

