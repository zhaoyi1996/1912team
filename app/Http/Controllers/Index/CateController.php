<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class CateController extends Controller
{
    //购物车展示
    public function index(Request $request){
        #判断用户是否登录
        $session=session('userInfo');
        dd($session);
        if(empty($session)){
            return redirect('/index/login');
        }

    	return view("index.cate.cate");
    }

}
