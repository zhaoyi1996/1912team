<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\AnnouModel;
class IndexController extends Controller
{
	public function index(){
		$res=AnnouModel::leftjoin("shop_goods","shop_annou.goods_id","=","shop_goods.goods_id")->get();
		return view('index.index',['res'=>$res]);
	}

}
