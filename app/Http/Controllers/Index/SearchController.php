<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class SearchController extends Controller
{
    //产品列表页
    public function index(Request $request){
    	return view("index.search");
    }

    //正品秒杀
    public function seckillIndex(Request $request){
    	return view("index.seckill-index");
    }
}
