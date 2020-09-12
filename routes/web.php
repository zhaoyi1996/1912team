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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test",function(){
	return view("test");
});


/***
后台
***/
//后台品牌管理
Route::get("/admin/brand","Admin\BrandController@index");

//后台商品规格展示
Route::get("/admin/specification","Admin\SpecificationController@index");

//后台模板管理
Route::get("/admin/template","Admin\TemplateController@index");

//后台模块分类管理
Route::get("/admin/cate","Admin\CateController@index");

//后台模块商品管理
Route::get("/admin/goods","Admin\GoodsController@index");

//后台模块广告类型管理
Route::get("/admin/category","Admin\CategoryController@index");

//后台模块广告管理
Route::get("/admin/content","Admin\ContentController@index");

//后台模块商家审核
Route::get("/admin/seller1","Admin\Seller1Controller@index");

//后台模块商家管理
Route::get("/admin/seller","Admin\SellerController@index");

//后台首页
Route::get("/admin/index","Admin\IndexController@index");