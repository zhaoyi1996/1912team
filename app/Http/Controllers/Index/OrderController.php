<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CartModel;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\DefaultModel;

// use App\Model\CartModel;


class OrderController extends Controller
{
    
    public function index(Request $request){
    	// 取出登录的用户
    	$user_id = session("User_Info")['user_id'];

    	//地址表
    	$defaultwhere = [
    		'user_id'=>$user_id,
    		'is_del'=>1,

    	];
    	$defaultinfo = DefaultModel::where($defaultwhere)->get();
    	// dd($defaultinfo);


    	// 查询购物车数据   接受购物车传过来的值
    	// $cart_id = request()->post("cart_id");
    	$cart_id = ['1','4','5'];

   		 	
    	// dd($cartwhere);
    	$cartinfo = CartModel::where('user_id',$user_id)->wherein('car_id',$cart_id)->leftjoin("shop_goods","shop_cart.goods_id","=","shop_goods.goods_id")->get();
    	// dd($cartinfo);

    	//循环获取总价
    	$price = 0;
    	//总商品数量
    	$numbers = 0;
    	foreach($cartinfo as $k=>$v){
    		$price += $v['car_num']*$v['goods_price'];
    		$numbers += $v['car_num'];
    	}
    	// dd($numbers);

    	//收货地址飙获取到默认收货地址数据、
    	$defwhere = [
    		'user_id'=>$user_id,
    		'fef_is_more'=>1
    	];
    	$defmo = DefaultModel::where($defwhere)->first();
    	// dd($defmo);



    	return view("index.order.orderinfo",['defaultinfo'=>$defaultinfo,'cartinfo'=>$cartinfo,'price'=>$price,'numbers'=>$numbers,'defmo'=>$defmo]);
    }
    //逻辑删除
    public function del($id){
    	$user_id  = session("User_Info")['user_id'];
    	$where = [
    		'fef_id'=>$id,
    	];
    	$res = DefaultModel::where($where)->update(['is_del'=>2]);
    	if($res){
    		return redirect("/index/orderinfo");
    	}else{
    		return redirect("/index/orderinfo");
    	}
    } 
}
