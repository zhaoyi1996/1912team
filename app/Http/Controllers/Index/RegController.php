<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegController extends Controller
{
    //注册页面
    public function reg(){
    	return view("index.reg.reg");
    }
}
