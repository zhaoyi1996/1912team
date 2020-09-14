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
//测试
Route::get("/test",function(){
	return view("test");
});

/***
后台
***/
Route::prefix('/admin')->group(function(){
			//后台品牌管理
		Route::get("/brand","Admin\BrandController@index");

		//后台商品规格展示
		Route::get("/specification","Admin\SpecificationController@index");

		//后台模板管理
		Route::get("/template","Admin\TemplateController@index");

		//后台模块分类管理
		Route::get("/cate","Admin\CateController@index");

		//后台模块商品管理
		Route::get("/goods","Admin\GoodsController@index");

		//后台模块广告类型管理
		Route::get("/category","Admin\CategoryController@index");

		//后台模块广告管理
		Route::get("/content","Admin\ContentController@index");

		//后台模块商家审核
		Route::get("/seller1","Admin\Seller1Controller@index");

		//后台模块商家管理
		Route::get("/seller","Admin\SellerController@index");

		//后台首页
		Route::get("/index","Admin\IndexController@index");

		/***
		rbac  
		***/
		//权限
		//权限添加
		Route::get("/rbac/pow/create","Rbac\PowController@create");
		//权限列表
		Route::get("/rbac/pow/list","Rbac\PowController@list");
		//角色添加
		Route::get("/rbac/role/create","Rbac\RoleController@create");
		//角色列表
		Route::get("/rbac/role/list","Rbac\RoleController@list");
		//管理员添加
		Route::get("/rbac/admin/create","Rbac\AdminController@create");
		//管理员列表
		Route::get("/rbac/admin/list","Rbac\AdminController@list");

});




