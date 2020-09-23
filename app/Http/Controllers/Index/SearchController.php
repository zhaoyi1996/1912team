<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopCollectModel;
use App\Model\BrandModel;
use App\Model\GoodsModel;
use App\Model\CategoryModel;

class SearchController extends Controller
{
    //产品列表页
    public function index(Request $request){
    	return view("index.search");
    }

    //正品秒杀
    public function seckillIndex(Request $request){
    	return view("index.seckill-index");
    }

    // //循环商品 
    // public function goods_list(){
    // 	$cate=CateModel::where("pid","=",0)->limit(6)->get();//查询商品的顶级分类
    // 	$brand=BrandModel::where(["brand_del"=>1])->limit(20)->get(); //仅展示逻辑删除的1
    // 	$data = GoodsModel::where(["del_id"=>1])->limit(20)->get();
    // 	// dd($data);
    // 	return ['code'=>111,'cate'=>$cate,'brand'=>$brand,'data'=>$data]);
    // }

    //收藏
    public function collect(){
    	$goods_id=request()->post();
    	// $session=session('');
    	// dd($goods_id);
       //user_id给固定的值   接收商品ID  时间
       $array=[
       		"user_id"=>5,
       		"goods_id"=>request()->goods_id,
       		"collect_time"=>time()
       ];
       //将数据入库
       $goods=ShopCollectModel::inser($array);
       if($goods){
       		$arr=[
       			"code"=>111,
       			"message"=>"收藏成功",
       		];
       }	
       //返回JSON串

        return json_decode($arr);
    }
}
