<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class CateController extends Controller
{
    //商品品牌展示
    public function index(Request $request){
    	return view("index.cate");
    }

}
