<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

use App\Model\ShopLtdModdel;
use App\Model\GoodsModel;
use App\Model\ShopLadverModel;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\ShopSlideModel;
class IndexController extends Controller
{

    public function index(){
        $slide=ShopSlideModel::all();
        //dd($slide);
    	return view("index.index",['slide'=>$slide]);
        #查询小广告信息
        $LadverWhere=[
            ['la_del','=',1]
        ];
        $ladver_data=ShopLadverModel::where($LadverWhere)->first();
        #查询今日推荐     ----排序方法是最近存入库的几件商品
        $recom_data=GoodsModel::orderBy('goods_add_time','desc')->limit(4)->get();
    	return view("index.index.index",['ladver_data'=>$ladver_data,'recom_data'=>$recom_data]);
    }

}
