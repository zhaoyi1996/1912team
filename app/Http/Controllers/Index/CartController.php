<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CartModel;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\CategoryModel;

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
//        dd($cart_data);die;
        foreach($cart_data as $v){
            $v->car_price=$v->goods_price*$v->car_num;
        }
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();
//        查询购物车表数据的条数
        $count=CartModel::all()->count();
        #查询购物车已删除数据
        $del_where=[
            ['car_is_del','=',2],
            ['user_id','=',$user_id]
        ];
        $del_data=CartModel::leftjoin('shop_goods','shop_cart.goods_id','=','shop_goods.goods_id')->where($del_where)->limit(3)->get();
    	return view("index.cart.cart",['cart_data'=>$cart_data,'cate'=>$cate,'count'=>$count,'del_data'=>$del_data]);
    }
    /**
     * 添加购物车
     */
    public function cartAdd(Request $request){
        $goods_id=$request->goods_id;
//        dd($goods_id);die;
        $car_num=$request->car_num;
        $str=$request->str;

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
            ['user_id','=',$session->user_id],
            ['str','=',json_encode($str)]
        ];
        $car_data=CartModel::where($goods_where)->first();
        if(!empty($car_data)){
            //如果商品已存在于数据库，就将购买数量进行相加
            $car_data->car_num=intval($car_data->car_num)+intval($car_num);
            // dd($car_data);
            $res=$car_data->save();
            if($res){
                return ['code'=>'0100','msg'=>'添加购物车成功'];
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
            $data->str=json_encode($str);
            $data->car_add_time=time();
            $res=$data->save();
            if($res){
                return ['code'=>'0100','msg'=>'添加购物车成功'];
            }else{
                return ['code'=>0001,'msg'=>'添加购物车失败'];
            }
        }
        
    }

    public function delete($goods_id){
        $res = CartModel::where('goods_id',$goods_id)->update(['car_is_del'=>2]);
        if($res){
            echo json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }

    public function deletes($goods_id){
        $res = CartModel::where('goods_id',$goods_id)->delete();
        if($res){
            echo json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }


    public function carts(){
        if(request()->isMethod("get")){
            $users=session("User_Info");  //用户信息
            if($users!==""){
                $res=CartModel::leftjoin("shop_goods","shop_goods.goods_id","=","shop_cart.goods_id")->where("user_id",$users->user_id)->get();
            }
            return view('index.cart.cart',['res'=>$res]);

        }
        if(request()->isMethod("post")){
            $data=request()->except(['car_id']);
            dd($data);
            $id=request()->car_id;
            $res=CartModel::where("car_id",$id)->update($data);
        }
    }


    //购物车点击+号修改购物车表的购买的数量
    public function nums(Request $request){
    $wenben=$request->wenben;
    $car_id=$request->car_id;
    $where=[
        'car_id'=>$car_id
    ];
    $cart=CartModel::where($where)->update(['car_num'=>$wenben]);

}

    //购物车点击-号修改购物车表的购买的数量
    public function jian(Request $request){
        $wenben=$request->wenben;
        $car_id=$request->car_id;
        $where=[
            'car_id'=>$car_id
        ];
        $cart=CartModel::where($where)->update(['car_num'=>$wenben]);

    }
}
