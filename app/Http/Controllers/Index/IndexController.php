<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

use App\Model\BrandModel;
use App\Model\ShopLtdModdel;
use App\Model\GoodsModel;
use App\Model\ShopLadverModel;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Redis;

use App\Model\ShopSlideModel;
class IndexController extends Controller
{

    public function index(){
        $slide=ShopSlideModel::where('is_del','1')->limit(5)->get();
        #查询小广告信息
        $LadverWhere=[
            ['la_del','=',1]
        ];
        $ladver_data=ShopLadverModel::where($LadverWhere)->first();
        #查询今日推荐     ----排序方法是最近存入库的几件商品
        $recom_data=GoodsModel::orderBy('goods_add_time','desc')->limit(4)->get();

        $recomWhere=[
            ['del_id','=',1]
        ];
        $recom_data=GoodsModel::where($recomWhere)->orderBy('goods_add_time','desc')->limit(4)->get();
        #将数据存入redis
//        $recom_key="recom_data";
//        Redis::set($recom_key,json_encode($recom_data,true));
//        expireat($recom_key);
        #获取猜你喜欢 --根据用户最近浏览记录和购买记录  推荐相应分类下

        #获取底部品牌logo信息
        $BrandWhere=[
            ['brand_del','=',1]
        ];
        $brand_data=BrandModel::where($BrandWhere)->limit(10)->get();
//        dd($brand_data);
        #猜你喜欢
    	return view("index.index.index",['ladver_data'=>$ladver_data,'recom_data'=>$recom_data,'brand_data'=>$brand_data,'slide'=>$slide]);

    }

}
