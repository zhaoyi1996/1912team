<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CartModel;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Brand;

class CartController extends Controller
{
    //购物车展示
    public function index(Request $request){
    
        #获取用户id
        $session=session('User_Info');
        $user_id=$session->user_id;
        #查询购物车表
        $cart_where=[
            ['user_id','=',$user_id],
            ['car_is_del','=',1],
            ['del_id','=',1]
        ];
        $cart_data=CartModel::leftjoin('shop_goods','shop_cart.goods_id','=','shop_goods.goods_id')->where($cart_where)->get();
        foreach($cart_data as $v){
            $v->car_price=$v->goods_price*$v->car_num;
        }
        // dd($cart_data);
    	return view("index.cart.cart",['cart_data'=>$cart_data]);
    }
    /**
     * 添加购物车
     */
    public function cartAdd(Request $request){
        $goods_id=$request->goods_id;
        $car_num=$request->car_num;
        if(empty($goods_id)){
            return ['code'=>0002,'msg'=>'请选择加入购物车的商品'];
        }
        if(empty($car_num)){
            return ['code'=>0003,'msg'=>'请选择加入购物车的数量'];
        }
        // $car_num=8;
        //获取用户id
        $session=session('User_Info');
        #查询数据库是否已经存在该商品
        $goods_where=[
            ['car_is_del','=',1],
            ['goods_id','=',$goods_id],
            ['user_id','=',$session->user_id]
        ];
        $car_data=CartModel::where($goods_where)->first();
        if(!empty($car_data)){
            //如果商品已存在于数据库，就将购买数量进行相加
            $car_data->car_num=intval($car_data->car_num)+intval($car_num);
            // dd($car_data);
            $res=$car_data->save();
            if($res){
                return ['code'=>'0000','msg'=>'添加购物车成功'];
            }else{
                return ['code'=>0001,'msg'=>'添加购物车失败'];
            }
        }else{
            //如果商品不存在与数据库，就进行入库
            //将数据入库
            $data=new CartModel;
            $data->user_id=$session->user_id;
            $data->goods_id=$goods_id;
            $data->car_num=$car_num;
            $data->car_add_time=time();
            $res=$data->save();
            if($res){
                return ['code'=>'0000','msg'=>'添加购物车成功'];
            }else{
                return ['code'=>0001,'msg'=>'添加购物车失败'];
            }
        }
        
    }
}
