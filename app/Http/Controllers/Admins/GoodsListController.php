<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Redis;
class GoodsListController extends Controller
{
    public function index(){

        $goods_name=request()->goods_name;
        $query=request()->all();
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        $pageSize=config('app.pageSize');

        $res=GoodsModel::leftjoin("shop_category","shop_category.cate_id","=","shop_goods.cate_id")
                        ->leftjoin("shop_brand","shop_brand.brand_id","=","shop_goods.brand_id")
                        ->where($where)->orderby('goods_id','desc')->paginate($pageSize);

        // ajax分页
        if(request()->ajax()){
            return view('goods.ajaxpage',['res'=>$res,'query'=>$query]);
        }
        return view('admins.goodslist.index',['res'=>$res,'query'=>$query]);
    }
}
