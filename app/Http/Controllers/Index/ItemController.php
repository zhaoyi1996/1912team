<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Brand;

class ItemController extends Controller
{
 
    public function index(Request $request){
     //  接收商品id
        $goods_id=$request->goods_id;
        $where=[
            'goods_id'=>$goods_id
        ];
        $goods=GoodsModel::where($where)->first();
       $ddd= explode("|",$goods->goods_imgs);
//        dd($ddd);
//        dd($goods['goods_imgs']);
    	return view("index.item",['goods'=>$goods,'goods_imgs'=>$ddd]);
    }

}
