<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\CenterModel;
class HomeIndexController extends Controller
{
    //我的订单
    public function index(Request $request){
        
    	return view("index.home-index");
    }
    //待付款
    public function homeOrderPay(){
    	return view("index.home-order-pay");
    }
    //待发货
     public function homeOrderSend(){
    	return view("index.home-order-send");
    }
    //待收货
     public function homeOrderReceive(){
    	return view("index.home-order-receive");
    }
    //待评价
     public function homeOrderEvaluate(){
    	return view("index.home-order-evaluate");
    }
    //我的收藏
    public function homePerson(){
    	return view("index.home-person-collect");
    }
    //我的足迹
     public function homePersonFootmark(){
    	return view("index.home-person-footmark");
    }
     //个人信息
     public function homeSettingInfo(){
//         $center=CenterModel::first();
//         dd($center);
     	return view("index.home-setting-info");
     }
    //地址信息
    public function homeSettingAddress(){
    	return view("index.home-setting-address");
    }
    //安全信息
    public function homeSettingSafe(){
    	return view("index.home-setting-safe");
    }
}
