<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandModel;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
class GoodsController extends Controller
{
    public function index(){
        $brand=BrandModel::all();
        $res=CategoryModel::all();
//        dd($cate);die;
        // 无限极分类
        $cate=$this->getres($res);
        return view('admins.goods.index',['brand'=>$brand,'cate'=>$cate]);
    }

public function create(Request $request){
    $data=$request->all();
//    if($data['goods_name']){
//        json_encode(['code'=>0,'msg'=>"商品名称不能为空"]);
//    }
//    if($data['goods_price']){
//        json_encode(['code'=>1,'msg'=>"商品名称不能为空"]);
//    }
    // 非空，字节长度
    $request->validate([
        'goods_name' => 'required|max:60'
    ],[
        'goods_name.required' => "分类名称不能为空！",
        'goods_name.max' => "字节长度不得超过60位！"
    ]);
    $res=GoodsModel::all();
    $goods=GoodsModel::insertGetId($data);
    if($goods){
        return view('admins.goodslist.index',['res'=>$res]);
    }
}

public function getres($res,$pid=0,$level=1){
static $info=[];
    foreach($res as $k=>$v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $info[]=$v;
            $this->getres($res,$v['cate_id'],$v['level']+1);
        }
    }
    return $info;
}

}
