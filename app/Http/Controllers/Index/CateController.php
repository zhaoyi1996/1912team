<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class CateController extends Controller
{
    //购物车展示
    public function index(Request $request){
        $user_pwd='111111';

        dd($user_pwd);

    	return view("index.cate.cate");
    }

}
