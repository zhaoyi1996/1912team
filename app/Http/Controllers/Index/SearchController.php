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
    	$goods_id=request()->goods_id;
    	// dd($goods_id);
    	$session=session('User_Info');
       	$collect=new ShopCollectModel();
    	$collect->goods_id=$goods_id;
    	$collect->user_id=$session->user_id;
    	$collect->collect_time=time();
    	// dd($collect);
    	$res=$collect->save();
    	// dd($res);
    	if($res){
    		return ['code'=>0000,'msg'=>'加入收藏成功'];
    	}else{
    		return ['code'=>0001,'msg'=>'加入收藏失败'];
    	}
       
    }
}
