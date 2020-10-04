<?php

namespace App\Http\Controllers\Index;

use App\Model\SeckillModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CategoryModel;
use Illuminate\Support\Facades\Redis;
use App\Model\OrderModel;
use App\Model\GoodsModel;

class SeckillController extends Controller
{
    //
    public function index(){

    	$cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();
        //查询数据
        $seckill = SeckillModel::leftjoin('shop_goods',"shop_seckill.goods_id",'=','shop_goods.goods_id')->get();
        // dd($seckill);
        // foreach($seckill as $k=>$v){
            
        //     for($i=0;$i<$v->goods_store;$i++){
        //         Redis::lpush("goods_store".$v->goods_id,1);
        //     }
        //     //   
        // }

        
        // echo Redis::llen("goods_store1");  




    	return view("index.seckill.index",['cate'=>$cate,'seckill'=>$seckill]);
    }
    public function seckilldo($seckill_id){
        // 接值
        // dd($seckill_id);
        // $seckill_id = request()->get("seckill_id");
        // 根据接收到的值  查询秒杀此商品的库存
        $redis_key;
        $where = [
            'seckill_id'=>$seckill_id
        ];
        $goodsinfo = SeckillModel::leftjoin('shop_goods','shop_seckill.goods_id','=',"shop_goods.goods_id")->where($where)->first();
        
        // 获取到商品的id
        $goods_id = $goodsinfo->goods_id;



        // 获取到用户的id
        $user_id = session("User_Info")['user_id'];
        // dd($user_id);

        if(!$user_id){
            return redirect("index/login");
        }

        //获取到此商品秒杀的数量
        $goods_store = Redis::llen("goods_store".$goods_id);

        // 根据用户id查询订单表  查询用户是否已经抢购过此商品
        $orderwhere = [
            'user_id'=>$user_id,
            'goods_id'=>$goods_id
        ];
        $orderInfo = OrderModel::where($orderwhere)->first();
        // dd($orderInfo);
         //获取到商品没下单的数量
        $goods_nu = $goodsinfo->goods_store;
        // dd($goods_nu);


        if(!$orderInfo){
            // echo "2";
            // 没抢过向下执行
            //弹出redis队列中的一个
            $rs = Redis::lpop("goods_store".$goods_id);
            if(!$rs){
                echo "售完了";die;
            }else{
                //抢购成功 加入订单表 跳转结算
                //
                //生成订单流水号
                $order_num = time().$user_id.rand(100,999);
                $order_num = md5(base64_encode($order_num));
                $order_number = substr($order_num,16);
                // dd($order_number);
                Redis::lpop("goods_store".$goods_id);

                $order = new OrderModel();
                $order->user_id = $user_id;
                $order->order_time=time();
                $order->order_status=0;
                $order->order_number = $order_number;
                $order->goods_id = $goods_id;
                $order->goods_name = $goodsinfo->goods_name;
                $order->order_num = 1;
                $order->goods_price = $goodsinfo->goods_price;
                $res = $order->save();
                if($res){
                    echo "抢购成功";
                    //相应减少购物车库存
                    $sql = GoodsModel::where('goods_id',$goods_id)->update(['goods_store'=>$goods_nu-1]);
                    if($sql){
                        //库存减少成功 跳转确认订单页面
                        
                    }else{
                        echo "商品库存减少失败";
                    }
                }else{
                    echo "抢购失败";
                }
            }
        }else{
            // echo "1";
            // 购买过 提示已经抢过 
            echo "您已经购买过此商品";
        }
    }
}
 