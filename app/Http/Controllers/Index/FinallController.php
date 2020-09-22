<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class FinallController extends Controller
{
 	//二维码
    public function index(Request $request){
    	return view("index.finall");
    }
    //支付页失败
    public function payfinall(Request $request){
    	return view("index.payfinall");
    }
    //支付成功
    public function paysuccess(Request $request){
    	return view("index.paysuccess");
    }
}
