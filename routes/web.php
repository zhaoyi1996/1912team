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


//测试
Route::get("/test",function(){
	return view("admins.home.index");
});

/***
后台
***/

//后台品牌管理
Route::any("/admin/brand/brand","Admin\BrandController@index");
Route::any("/admin/brand/test","Admin\BrandController@test");
Route::any("/admin/brand/edit/{id}","Admin\BrandController@edit");
Route::any("/admin/brand/update/{id}","Admin\BrandController@update");
Route::any("/admin/brand/delete/{id}","Admin\BrandController@delete");
Route::any("/admin/brand/img","Admin\BrandController@img");
Route::any("/admin/brand/create","Admin\BrandController@create");
//登录后台
Route::get("/admin/login","Rbac\LoginController@login");
Route::post("/admin/logindo","Rbac\LoginController@logindo");
//退出登录
Route::get("/admin/loginout","Rbac\LoginController@loginout");

//后台模块
Route::prefix('/admin')->group(function(){
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

		//后台商品规格管理
		Route::get("/template/repertory/index","Admin\Repertory\RepertoryController@index");
		Route::get("/template/repertory/create","Admin\Repertory\RepertoryController@create");
		Route::post("/template/repertory/add","Admin\Repertory\RepertoryController@add");
		Route::post("/template/repertory/adds","Admin\Repertory\RepertoryController@adds");

	Route::post("/template/repertory/specification","Admin\Repertory\RepertoryController@specification");



	
	//后台模块分类管理

		Route::get("/cate","Admin\CateController@index");
		//后台模块商品管理
		Route::get("/goods","Admin\GoodsController@index");

		//后台模块轮播图管理
		Route::get("/category","Admin\CategoryController@index"); //轮播图展示
		Route::any("/category/create","Admin\CategoryController@create"); //轮播图添加展示
		Route::any("/category/story","Admin\CategoryController@story"); //执行添加
		Route::any("/category/getsun","Admin\CategoryController@getsun"); //接收图片并返回视图
		Route::any("/category/destroy/{id}","Admin\CategoryController@destroy");	//逻辑删除
		Route::any("/category/edit/{id}","Admin\CategoryController@edit");	//执行修改
		Route::any("/category/update","Admin\CategoryController@update");	//执行修改

		//后台模块公告管理
		Route::get("/content","Admin\ContentController@index"); //公告展示
		Route::any("/content/create","Admin\ContentController@create"); //公告添加展示
		Route::any("/content/story","Admin\ContentController@story"); //公告执行添加
		Route::any("/content/edit/{id}","Admin\ContentController@edit"); //修改视图
		Route::any("/content/update","Admin\ContentController@update"); //执行修改
		Route::any("/content/destroy/{id}","Admin\ContentController@destroy"); //逻辑删除

		// 小广告模块
		Route::get("/ladver","Admin\LadverController@index"); //小广告展示
		Route::any("/ladver/create","Admin\LadverController@create"); //小广告添加视图
		Route::any("/ladver/story","Admin\LadverController@story");//小广告执行添加
		Route::any("/ladver/getsun","Admin\LadverController@getsun");//接收图片返回视图
		Route::any("/ladver/edit/{id}","Admin\LadverController@edit"); //修改视图
		Route::any("/ladver/update","Admin\LadverController@update"); //执行修改
		Route::any("/ladver/destroy/{id}","Admin\LadverController@destroy"); //逻辑删除
		Route::any("/ladver/ajaxdel","Admin\LadverController@ajaxdel"); //ajax删除 -直接删除-

		// 底部友情链接
		Route::get("/foot","Admin\FootController@index"); //底部友情链接展示
		Route::any("/foot/create","Admin\FootController@create"); //添加视图
		Route::any("/foot/story","Admin\FootController@story"); //执行添加
		Route::any("/foot/destroy/{id}","Admin\FootController@destroy");	//逻辑删除
		Route::any("/foot/edit/{id}","Admin\FootController@edit");	//修改视图
		Route::any("/foot/update","Admin\FootController@update");	//执行修改

		// 导航
		Route::get("/nav","Admin\NavController@index"); //导航展示
		Route::any("/nav/create","Admin\NavController@create"); //添加视图
		Route::any("/nav/story","Admin\NavController@story"); //执行添加
		Route::any("/nav/destroy/{id}","Admin\NavController@destroy");	//逻辑删除
		Route::any("/nav/edit/{id}","Admin\NavController@edit");	//修改视图
		Route::any("/nav/update","Admin\NavController@update");	//执行修改

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


Route::prefix('admins')->group(function(){
	//商家后台管理首页
	Route::get("/index","Admins\IndexController@index");
	//基本管理  修改资料
	Route::get("/seller","Admins\SellerController@index");
	//修改密码
	Route::get("/pass","Admins\PassrController@index");
	//新增商品
	Route::get("/goods","Admins\GoodsController@index");
	//商品管理
	Route::get("/goodslist","Admins\GoodsListController@index");

	Route::get("/home","Admins\HomeController@index");
	//商家入驻申请
	Route::get("/register","Admins\RegisterController@index");
	//后台商家登录
	Route::get("/shoplogin","Admins\ShopLoginController@index");
});



Route::prefix('/goods')->group(function(){
	//ajax删除
	Route::get('/delete/{id}','Admins\GoodsController@delete');
	//上传图片
	Route::any('/uploads','Admins\GoodsController@uploads');
	//多图片上传
	Route::any('/uploadss','Admins\GoodsController@uploadss');
	//商品修改视图
	Route::get('/edit/{id}','Admins\GoodsController@edit');
	//商品修改
	Route::post('/update/{id}','Admins\GoodsController@update');
	//ajax添加
	Route::post('/img','Admins\GoodsController@img');
	//无限极分类
	Route::any("/getres","Admins\GoodsController@getres");
});

Route::prefix('/index')->group(function(){
	//前台登录
	Route::get("/login","Index\LoginController@login");
	//前台执行登录
	Route::post("/logindo","Index\LoginController@logindo");
	// 前台注册+执行注册
	// Route::get("/reg","Index\LoginController@reg");
	// Route::post("/regdo","Index\LoginController@regdo");
	//获取邮箱验证码
	Route::post("/sendEmail","Index\LoginController@sendEmail");

	//前台注册
	Route::get("/reg","Index\RegController@reg");
	Route::post("/regdo","Index\RegController@regdo");
	//地址管理
	Route::get("/homeSettingAddress","Index\AddressController@index");
	Route::get("/homeaddress/create","Index\AddressController@create");
	Route::get("/homeaddress/del/{id}","Index\AddressController@del");
	//设置为默认收货地址
	Route::get("/homeaddress/moren","Index\AddressController@moren");
	//收货地会添加
	Route::get("/homeaddress/create","Index\AddressController@create");
	Route::post("/homeaddress/store","Index\AddressController@store");
	//收货地址修改
	Route::get("/homeaddress/upd/{id}","Index\AddressController@upd");
	Route::post("/homeaddress/update/{id}","Index\AddressController@update");

	 //地址管理
	 Route::get("/homeSettingAddress","Index\AddressController@index");
	 Route::get("/homeaddress/create","Index\AddressController@create");
	 Route::get("/homeaddress/del/{id}","Index\AddressController@del");
	 //设置为默认收货地址
	 Route::get("/homeaddress/moren","Index\AddressController@moren");
	 //收货地址添加
	 Route::post("/homeaddress/store","Index\AddressController@store");


	 //收货地址修改
	 Route::get("/homeaddress/upd/{id}","Index\AddressController@upd");
	 Route::post("/homeaddress/update/{id}","Index\AddressController@update");
//	 /index//update/7
//	 个人中心收藏
	Route::get("/home/collects","Index\CollectController@index");
	//收藏逻辑删除
	Route::get("/home/collects/del/{id}","Index\CollectController@del");
	//个人中心浏览历史
	Route::get("/home/history","Index\HistioyController@index");
	//个人中心浏览历史逻辑删除
	Route::get("/home/history/{id}","Index\HistioyController@del");



	Route::get("/home/dizhi","Index\DizhiController@index");
	Route::get("/home/dizhi/upd/{id}",'Index\DizhiController@upd');
	//软删除
	Route::get("/home/dizhi/del/{id}","Index\DizhiController@del");
	Route::post('/home/dizhi/create',"Index\DizhiController@create");
	Route::get("/home/dizhi/shezhi/{id}","Index\DizhiController@shezhi");
	Route::post("/home/dizhi/update/{id}","Index\DizhiController@update");


	//订单展示
	Route::any("/orderinfo/{goods_id}","Index\OrderController@index")->middleware('SessionLogin');
	Route::get("/order/del/{id}","Index\OrderController@del");


	//秒杀
	Route::get("/seckill","Index\SeckillController@index");
	Route::get("/seckill/seckilldo/{id}","Index\SeckillController@seckilldo");
	
	Route::post("/orderinfo/tijiao","Index\OrderController@tijiao");
	
});




//前台展示
	Route::any("/goods/index","Index\GoodsController@index"); //全部商品分类
	Route::any("/index/index","Index\IndexController@index");//全部商品
	Route::any("/index/cateInfo","Index\IndexController@cateInfo");
	Route::any("/index/getIndexInfo","Index\IndexController@getIndexInfo");//接收上一个	
	

//订单展示
	Route::any("/index/order_info","Index\OrderController@index")->middleware('SessionLogin');

	//收银台
	Route::any("/index/finall","Index\FinallController@index");
	//支付页失败页面
	Route::any("/index/payfinall","Index\FinallController@payfinall");
	//支付成功页面
	Route::any("/index/paysuccess","Index\FinallController@paysuccess");
	//招商合作页面
	Route::any("/index/cooperation","Index\CooperationController@index");
	Route::any("/index/sampling","Index\CooperationController@sampling");
//订单中心
	//我的订单
	Route::any("/index/homeIndex","Index\HomeIndexController@index");
	//待付款
	Route::any("/index/homeOrderPay","Index\HomeIndexController@homeOrderPay");
	//待发货
	Route::any("/index/homeOrderSend","Index\HomeIndexController@homeOrderSend");
	//待收货
	Route::any("/index/homeOrderReceive","Index\HomeIndexController@homeOrderReceive");
	//待评价
	Route::any("/index/homeOrderEvaluate","Index\HomeIndexController@homeOrderEvaluate");
//我的中心
	//我的收藏
	Route::any("/index/homePersonCollect","Index\HomeIndexController@homePersonCollect");
	//我的足迹
	Route::any("/index/homePersonFootmark","Index\HomeIndexController@homePersonFootmark");

//物理消息----

	//物理消息----
//设置
	//个人信息
	Route::any("/index/homeSettingInfo","Index\CenterController@homeSettingInfo");
	Route::any("/index/add","Index\CenterController@add");

	


	// 我的收藏
	Route::any("index.home-person-collect","Index\HomeIndexController@homePersonCollect");
	//物理消息----
	//设置
	//个人信息
	Route::any("/index/home","Index\HomeIndexController@homeSettingInfo");

	//我的收藏
	Route::any("/index/homePerson","Index\HomeIndexController@homePerson");

	//我的足迹
	Route::any("/index/homePersonFootmark","Index\HomeIndexController@homePersonFootmark");

	//安全管理
	Route::any("/index/homeSettingSafe","Index\HomeIndexController@homeSettingSafe");

//首页
	Route::any("/","Index\IndexController@index");

	//商品详情页
	Route::any("/index/item/{goods_id}","Index\ItemController@index");

	Route::get("/index/item/{id}","Index\ItemController@index");
	Route::post("/index/item/price","Index\ItemController@price");

	//个人注册
	Route::any("/index/register","Index\RegisterController@index");

	Route::any("/index/item/{id}","Index\ItemController@index");

//产品列表页
	Route::get("/index/search","Index\SearchController@index");
	Route::post("/index/search/clicks","Index\SearchController@clicks");


	//收藏
	Route::any("/index/collect","Index\SearchController@collect");


//正品秒杀

    Route::any("/index/seckillIndex","Index\SearchController@seckillIndex");

	Route::any("/index/seckillIndex","Index\SearchController@seckillIndex");
	
 //我的店铺
 	
	Route::any("/index/shop","Index\ShopController@index");
	
//购物车页面
Route::get("/index/cart","Index\CartController@index")->middleware('SessionLogin');
Route::post("/index/cartAdd","Index\CartController@cartAdd")->middleware('SessionLogin');//添加购物车

//删除
Route::get('/cart/delete/{goods_id}','Index\CartController@delete');
Route::get('/cart/deletes/{goods_id}','Index\CartController@deletes');

Route::post('/indexs/carts','Index\CartController@carts');


Route::get('/index/ali','Index\AliPayController@test');//支付宝支付测试


Route::get('/index/alipay','Index\IndexController@getAliPayjieguo');//支付宝支付测试


// Route::get('/', function () {
// 	phpinfo();
//     // return view('welcome');
// });




