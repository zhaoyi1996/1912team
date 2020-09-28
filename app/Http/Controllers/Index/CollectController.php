<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopCollectModel;
use App\Model\GoodsModel;

class CollectController extends Controller
{
    //个人中心收藏
	public function index(){
		//取出登录时存sessionid
		$user_id = session('User_Info')['user_id'];
		// dd($user_id);
		//读取数据 渲染页面
		$where = [
			'user_id'=>$user_id,
			'del_id' =>1,
			'is_show'=>1,
			'is_del'=>1
		];
		$info = ShopCollectModel::where($where)
								->leftjoin("shop_goods","shop_collect.goods_id","=","shop_goods.goods_id")
								->get();
		return view("index.home.collect",['collects'=>$info]);
	}
	public function del($id){

		$res = ShopCollectModel::where('collect_id',$id)->update(['is_del'=>2]);
		if($res){
			return redirect("/index/home/collects");
		}else{
			return redirect("/index/home/collects");
		}

	}
}
