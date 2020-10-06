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

    public function index(Request $request,$id){

        // 接受传过来的值
        $fef_id = $request->get("fef_id");

        $cart_id = explode(',',$id);
        //根绝传过来的收货地址id获取到一条数据 来进行用那条收货地址进行下单
        $fefinfo = DefaultModel::where('fef_id',$fef_id)->first();
        // dd($fefinfo);

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
//    	$cart_id =request()->get('car_id');
//
//        dd($cart_id);


    	// dd($cartwhere);
    	$cartinfo = CartModel::where('user_id',$user_id)->whereIn('car_id',$cart_id)->leftjoin("shop_goods","shop_cart.goods_id","=","shop_goods.goods_id")->get();
    	// dd($cartinfo);


    	//循环获取总价
    	$price = 0;
    	//总商品数量
    	$numbers = 0;
        //求总共多少积分 + 总共优惠多少
        $integral=0;
        $coupon = 0;
    	foreach($cartinfo as $k=>$v){
    		$price += $v['car_num']*$v['goods_price'];
    		$numbers += $v['car_num'];
            $integral += $v['goods_integral']*$v['car_num'];
            $coupon += $v['goods_coupon']*$v['car_num'];
    	}
        // dd($integral);
    	// dd($numbers);


        // 满减
        // 重新获取满减
        //满减规则
        if($price>=100&&$price<200){
            $less_price = 10;
        }else if($price>=200&&$price<500){
            $less_price = 25;
        }else if($price>=500&&$price<600){
            $less_price = 50;
        }else if($price>=600&&$price<700){
            $less_price = 65 ;
        }else if($price>=700&&$price<3000){
            $less_price = 85;
        }else if($price>=3000&&$price<5000){
            $less_price=120;
        }else if($price>=5000&&$price<8000){
            $less_price=150;
        }else if($price>=8000&&$price<10000){
            $less_price=200;
        }else if($price>10000){
            $less_price=300;
        }else{
            $less_price=0;
        }

    	//收货地址飙获取到默认收货地址数据、
    	$defwhere = [
    		'user_id'=>$user_id,
    		'fef_is_more'=>1
    	];
    	$defmo = DefaultModel::where($defwhere)->first();
    	// dd($defmo);
         //满减后 + 优惠价后的 实际付款价格
        $manjianprice = $price-$less_price;
        //重新计算应付金额
        $yingfunumber = $manjianprice-$coupon;
        // dd($yingfunumber);

    	return view("index.order.orderinfo",["less_price"=>$less_price,"manjianprice"=>$manjianprice,"yingfunumber"=>$yingfunumber,"integral"=>$integral,'coupon'=>$coupon,'fefinfo'=>$fefinfo,'defaultinfo'=>$defaultinfo,'cartinfo'=>$cartinfo,'price'=>$price,'numbers'=>$numbers,'defmo'=>$defmo]);
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

    public function tijiao()
    {
        // dd();
        $car_id = request()->post('car_id');
        // $car_id = explode($car_id);
        $cart_id = json_decode($car_id);
        $order_number = $this->generateID();
        // dd($order_number);
        // 取出登录的用户
        $user_id = session("User_Info")['user_id'];
        $cartinfo = CartModel::where('user_id', $user_id)->wherein('car_id', $cart_id)->leftjoin("shop_goods", "shop_cart.goods_id", "=", "shop_goods.goods_id")->get();
        // dd($cartinfo);
        //收货地址飙获取到默认收货地址数据、
        $defwhere = [
            'user_id' => $user_id,
            'fef_is_more' => 1
        ];
        $defmo = DefaultModel::where($defwhere)->first();
        //循环获取总价
        $price = 0;
        //总商品数量
        $numbers = 0;
        //求总共多少积分 + 总共优惠多少
        $integral = 0;
        $coupon = 0;
        foreach ($cartinfo as $k => $v) {
            $price += $v['car_num'] * $v['goods_price'];
            $numbers += $v['car_num'];
            $integral += $v['goods_integral'] * $v['car_num'];
            $coupon += $v['goods_coupon'] * $v['car_num'];
        }
        // dd($price);


        foreach ($cartinfo as $k => $v) {
            // 将数据存入订单商品表
            $wheress = [
                'goods_id' => $v->goods_id,
                'user_id' => $user_id,
            ];

            $order_goods_info = OrderGoodsModel::where($wheress)->get();
//             dd($order_goods_info);
            if (!empty($order_goods_info)) {
                if (time() - $v->ordergoodstime < 3000) {
                    foreach ($order_goods_info as $kkk => $vvv) {
                        $orderinfo = OrderModel::where('order_number', $vvv->order_number)->get();
                        // return redirect("/index/ali/".$orderinfo->order_id);
                        foreach ($orderinfo as $k => $v) {
                            session(['order_id' => ['order_id' => $v->order_id, 'user_id' => $user_id]]);
                            return ['code' => 1];
            // $ordergoods = new OrderModel();
            $order = new OrderModel();
            $order->user_id = $user_id;
            $order->order_status=0;
            $order->order_time=time();
            $order->order_number=$order_number;
            $order->order_num = $numbers;
            $order->order_url=$defmo->fef_id;
            $order->goods_price = $price;
            $res = $order->save();
                
            $id =$order->order_id;
            if($res){
                session(['order_id'=>['order_id'=>$id,'user_id'=>$user_id]]);
                return ['code'=>1];
            }else{
                echo "提交失败";
                 $wheress = [
                'goods_id'=>$v->goods_id,
                'user_id'=>$user_id,
                ];

                $order_goods_info = OrderGoodsModel::where($wheress)->get();
                // dd($order_goods_info);  
                if($order_goods_info){
                    if(time()-$v->ordergoodstime>3000){
                        foreach($order_goods_info as $kkk=>$vvv){
                            $orderinfo = OrderModel::where('order_number',$vvv->order_number)->get();
                            // return redirect("/index/ali/".$orderinfo->order_id);
                            foreach($orderinfo as $k=>$v){
                                return redirect("/index/ali/".$v->order_id);
                            }
                        }
                    }else{
                        // 已过期重新添加数据
                        $ordergoods = new OrderGoodsModel();
                        $ordergoods->user_id = $user_id;
                        $ordergoods->buy_number = $numbers;
                        $ordergoods->goods_id=$v->goods_id;
                        $ordergoods->ordergoodstime=time();
                        $ordergoods->order_number=$order_number;
                        $ordergoods->save();

                         // 将数据存入订单商品表
                        // $ordergoods = new OrderModel();
                        $order = new OrderModel();
                        $order->user_id = $user_id;
                        $order->order_status=0;
                        $order->order_time=time();
                        $order->order_number=$order_number;
                        $order->order_num = $numbers;
                        $order->order_url=$defmo->fef_id;
                        $order->goods_price = $price;
                        $res = $order->save();
                            
                        $id =$order->order_id;
                        // dd($id);
                        if($res){
			    session(['order_id'=>['order_id'=>$id,'user_id'=>$user_id]]);
                	    return ['code'=>1];
                        }else{
                            echo "提交失败";
                        }
                    }
                } else {
                    // 已过期重新添加数据
                    $ordergoods = new OrderGoodsModel();
                    $ordergoods->user_id = $user_id;
                    $ordergoods->buy_number = $numbers;
                    $ordergoods->goods_id = $v->goods_id;
                    $ordergoods->ordergoodstime = time();
                    $ordergoods->order_number = $order_number;
                    $ordergoods->save();

                    // 将数据存入订单商品表
                    // $ordergoods = new OrderModel();
                    $order = new OrderModel();
                    $order->user_id = $user_id;
                    $order->order_status = 0;
                    $order->order_time = time();
                    $order->order_number = $order_number;
                    $order->order_num = $numbers;
                    $order->order_url = $defmo->fef_id;
                    $order->goods_price = $price;
                    $res = $order->save();

                    $id = $order->order_id;
                    // dd($id);
                    if ($res) {
                        session(['order_id' => ['order_id' => $id, 'user_id' => $user_id]]);
                        return ['code' => 1];
                    } else {
                        echo "提交失败";
                    }
                }
            } else {
                $ordergoods = new OrderGoodsModel();
                $ordergoods->user_id = $user_id;
                $ordergoods->buy_number = $numbers;
                $ordergoods->goods_id = $v->goods_id;
                $ordergoods->ordergoodstime = time();
                $ordergoods->order_number = $order_number;
                $ordergoods->save();

                // 将数据存入订单商品表
                // $ordergoods = new OrderModel();
                $order = new OrderModel();
                $order->user_id = $user_id;
                $order->order_status = 0;
                $order->order_time = time();
                $order->order_number = $order_number;
                $order->order_num = $numbers;
                $order->order_url = $defmo->fef_id;
                $order->goods_price = $price;
                $res = $order->save();

                $id = $order->order_id;
                // dd($id);
                if ($res) {
                    session(['order_id' => ['order_id' => $id, 'user_id' => $user_id]]);
                    return ['code' => 1];
                } else {
                    echo "提交失败";
                }
            }
        }
    }


}
}
