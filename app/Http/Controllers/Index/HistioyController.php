<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopHistoryModel;


class HistioyController extends Controller
{
    //
    public function index(){
    	$user_id = session("User_Info")['user_id'];
    	$where = [
    		'user_id'=>$user_id,
    		'is_del'=>1,
    		'del_id'=>1,
    		'is_show'=>1
    	];
    	$history = ShopHistoryModel::where($where)
    								->leftjoin("shop_goods","shop_history.goods_id","=","shop_goods.goods_id")
    								->get();
    	return view("index.home.history",['history'=>$history]);

    }
    public function del($id){
    	$res = ShopHistoryModel::where('his_id',$id)->update(['is_del'=>2]);
		if($res){
			return redirect("/index/home/history");
		}else{
			return redirect("/index/home/history");
		}
    }
}
