<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class ShopController extends Controller
{
    //我的店铺
    public function index(Request $request){
    	return view("index.shop");
    }

}
