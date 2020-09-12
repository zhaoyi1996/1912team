<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //商品后台商品管理
    public function index(){
    	return view("admin.goods.index");
    }
}
