<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\BrandModel;
use App\Model\CategoryModel;
use App\Model\ShopCollectModel;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{  
    //产品列表页
    public function index(Request $request){
        // // 根据(商品)表来查询品牌表(brand_img,),分类表(goods_price,pid)
        $GoodsCate =  GoodsModel::select('goods_id','brand_img','pid','goods_price')
                    ->leftjoin('shop_category','shop_goods.cate_id','=','shop_category.cate_id')
                    ->leftjoin('shop_brand','shop_goods.brand_id','=','shop_brand.brand_id')
                    ->orderBy("goods_price","desc")
                    ->limit(1)
                    ->first();
                    // ->toArray();  
         
        // dd($GoodsCate['goods_price']);
        $max=$GoodsCate['goods_price'];

        // 定义空数组
         $array = [];
         // 转为一维数组/去重
         foreach($GoodsCate as $k=>$v){
             // dd($v);
            $array[]= $v['brand_img'];
             $array = array_unique($array);
         };
 
         $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();

        //3-- 获取价格区间
        // $where =[];
       $price_qujian= $this->getPriceSection($max);

        // dd($price_qujian);

    	return view("index.search",['GoodsCate'=>$GoodsCate,'array'=>$array,'price_qujian'=>$price_qujian,'cate'=>$cate]);
    }

    //正品秒杀
    public function seckillIndex(Request $request){
    	return view("index.seckill-index");
    }

     // 获取价格区间
     public function getPriceSection($max_price){
        $price=$max_price/4;
        // dd($price);
        $priceInfo=[];//一维数组
        // 左边 0  1000 2000  3000  4000
        // 右边  999 1999   2999  3999
        for($i=0;$i<=3;$i++){
            $start=$price*$i;
           $end=($i+1)*$price-0.01;
           $priceInfo[]=number_format($start,2).'-'.number_format($end,2);
            
        }
        $priceInfo[]=$max_price.'及以上';
        // print_r($priceInfo);
        return $priceInfo;
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
    	// dd($goods_id);
    	// $session=session('');
    	// dd($goods_id);
       //user_id给固定的值   接收商品ID  时间
       $array=[
       		"user_id"=>5,
       		"goods_id"=>request()->goods_id,
       		"collect_time"=>time()
       ];
       //将数据入库
       $goods=ShopCollectModel::insert($array);
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
