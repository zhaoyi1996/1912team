<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
class GoodsListController extends Controller
{
    public function index(){

        $goods_name=request()->goods_name;
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        $res=GoodsModel::all();

        return view('admins.goodslist.index',['res'=>$res]);
    }
}
