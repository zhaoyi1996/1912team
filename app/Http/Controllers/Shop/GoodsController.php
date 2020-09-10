<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopModel;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * 商品添加
     * 
     */
    public function create(){
        return view('admin.shop.create');
    }
    /**
     * 确认添加
     * 
     */
    public function add(){
        $data=request()->post();
        $shop= new ShopModel();
        $res=$shop->create($data);
        if($res){
            return ['code'=>0,'msg'=>'添加成功'];
        }else{
            return ['code'=>1,'msg'=>'添加失败'];
        }
    }
}
