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
	return view("admins.home.index");
});

/***
后台
***/

//后台品牌管理
Route::any("/admin/brand","Admin\BrandController@index");
Route::any("/admin/test","Admin\BrandController@test");
Route::any("/admin/edit/{id}","Admin\BrandController@edit");
Route::any("/admin/update/{id}","Admin\BrandController@update");
Route::any("/admin/delete/{id}","Admin\BrandController@delete");
Route::any("/admin/img","Admin\BrandController@img");

//登录后台
Route::get("/admin/login","Rbac\LoginController@login");
Route::post("/admin/logindo","Rbac\LoginController@logindo");
//退出登录
Route::get("/admin/loginout","Rbac\LoginController@loginout");

//后台模块
Route::prefix('/admin')->middleware("islogin")->group(function(){
			//后台品牌管理
		Route::get("/brand","Admin\BrandController@index");
		//后台商品规格展示
		Route::get("/specification","Admin\SpecificationController@index");

		//后台模板管理
		Route::get("/template","Admin\TemplateController@index");
		Route::post("/template/create","Admin\TemplateController@create");



		//后台模板管理
		Route::get("/template","Admin\TemplateController@index");


		//后台模块分类管理

		Route::any("/cate","Admin\CateController@index"); //展示视图
		Route::get("/cate/create","Admin\CateController@create"); //添加视图
		Route::post("/cate/getTree","Admin\CateController@getTree");//无限极分类
		Route::any("/cate/store","Admin\CateController@store");	//执行添加
		Route::any("/cate/cateup","Admin\CateController@cateup"); //即点即改
		Route::any("/cate/destroy/{id}","Admin\CateController@destroy"); //逻辑删除
		Route::post("/cate/update/{id}","Admin\CateController@update");//执行修改
		Route::any("/cate/edit/{id}","Admin\CateController@edit"); //修改视图

		//后台商品属性管理
		Route::get("/template/attr/index","Admin\Specification\AttrController@index");
		Route::get("/template/attr/create","Admin\Specification\AttrController@create");
		Route::post("/template/attr/add","Admin\Specification\AttrController@add");
		Route::get("/template/attr/del/{id}","Admin\Specification\AttrController@del");
		Route::get("/template/attr/edit/{id}","Admin\Specification\AttrController@edit");
		Route::post("/template/attr/update/{id}","Admin\Specification\AttrController@update");
		//后台商品属性值管理
		Route::get("/template/attrval/index","Admin\Specification\AttrvalController@index");
		Route::get("/template/attrval/create","Admin\Specification\AttrvalController@create");
		Route::post("/template/attrval/add","Admin\Specification\AttrvalController@add");
		Route::get("/template/attrval/del/{id}","Admin\Specification\AttrvalController@del");
		Route::get("/template/attrval/edit/{id}","Admin\Specification\AttrvalController@edit");
		Route::post("/template/attrval/update/{id}","Admin\Specification\AttrvalController@update");

		Route::get("/template/attrval/cartesian","Admin\Specification\AttrvalController@cartesian");


	//后台模块分类管理

		Route::get("/cate","Admin\CateController@index");
		//后台模块商品管理
		Route::get("/goods","Admin\GoodsController@index");

		//后台模块广告类型管理
		Route::get("/category","Admin\CategoryController@index");
		//后台模块广告管理


		//后台模块轮播图管理
		Route::get("/category","Admin\CategoryController@index");

		//后台模块公告管理

		Route::get("/content","Admin\ContentController@index");
		//后台模块商家审核
		Route::get("/seller1","Admin\Seller1Controller@index");
		//后台模块商家管理
		Route::get("/seller","Admin\SellerController@index");
		//后台首页

		Route::get("/index","Admin\IndexController@index");



		Route::get("/","Admin\IndexController@index");


		/***
		rbac  
		***/
		//权限
		//权限添加
		Route::get("/rbac/pow/create","Rbac\PowController@create");
		Route::post("/rbac/pow/store","Rbac\PowController@store");
		Route::get("/rbac/pow/del/{id}","Rbac\PowController@del");
		Route::get("/rbac/pow/upd/{id}","Rbac\PowController@upd");
		Route::post("/rbac/pow/update/{id}","Rbac\PowController@update");
		//权限列表
		Route::get("/rbac/pow/list","Rbac\PowController@list");
		//角色添加
		Route::get("/rbac/role/create","Rbac\RoleController@create");
		Route::post("/rbac/role/store","Rbac\RoleController@store");
		Route::get("/rbac/role/del/{id}","Rbac\RoleController@del");
		Route::get("/rbac/role/fus/{id}","Rbac\RoleController@fus");
		Route::post("/rbac/role/fus2","Rbac\RoleController@fus2");
		Route::get("/rbac/role/upd/{id}","Rbac\RoleController@upd");
		Route::post("/rbac/role/update/{id}","Rbac\RoleController@update");
	    Route::get("/rbac/role/fusdel/{id}","Rbac\RoleController@fusdel");
	 	//角色列表
		Route::get("/rbac/role/list","Rbac\RoleController@list");
		//管理员添加
		Route::get("/rbac/admin/create","Rbac\AdminController@create");
		Route::post("/rbac/admin/store","Rbac\AdminController@store");
		Route::get("/rbac/admin/del/{id}","Rbac\AdminController@del");
		Route::get("/rbac/admin/fus/del/{id}","Rbac\AdminController@fusdel");
		Route::get("/rbac/admin/fus/{id}","Rbac\AdminController@fus");
		Route::post("/rbac/admin/fus2","Rbac\AdminController@fus2");
		Route::get("/rbac/admin/upd/{id}","Rbac\AdminController@upd");
		Route::post("/rbac/admin/update/{id}","Rbac\AdminController@update");
		//管理员列表
		Route::get("/rbac/admin/list","Rbac\AdminController@list");


});



//商家后台管理首页
Route::get("/admins/index","Admins\IndexController@index");

//基本管理  修改资料
Route::get("/admins/seller","Admins\SellerController@index");

//修改密码
Route::get("/admins/pass","Admins\PassrController@index");


//新增商品
Route::get("/admins/goods","Admins\GoodsController@index");

//商品管理
Route::get("/admins/goodslist","Admins\GoodsListController@index");

Route::get("/admins/home","Admins\HomeController@index");

//商家入驻申请
Route::get("/admins/register","Admins\RegisterController@index");

//后台商家登录
Route::get("/admins/shoplogin","Admins\ShopLoginController@index");

//修改资料
Route::post("/seller/create","Admins\SellerController@create");

//商品添加执行
//Route::any("/goods/create","Admins\GoodsController@create");

//无限极分类
Route::any("/goods/getres","Admins\GoodsController@getres");


//ajax删除
Route::get('/goods/delete/{id}','Admins\GoodsController@delete');
//上传图片
Route::any('/goods/uploads','Admins\GoodsController@uploads');

//商品修改视图
Route::get('/goods/edit/{id}','Admins\GoodsController@edit');

//商品修改
Route::post('/goods/update/{id}','Admins\GoodsController@update');

//ajax添加
Route::post('/goods/img','Admins\GoodsController@img');


Route::prefix('/index')->group(function(){
	//前台登录
	Route::get("/login","Index\LoginController@login");
	//前台执行登录
	Route::post("/logindo","Index\LoginController@logindo");
	// 前台注册+执行注册
	Route::get("/reg","Index\LoginController@reg");
	Route::post("/regdo","Index\LoginController@regdo");
	//获取邮箱验证码
	Route::post("/sendEmail","Index\LoginController@sendEmail");
});

