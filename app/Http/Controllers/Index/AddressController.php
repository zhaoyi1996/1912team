<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //个人中心地址展示
    public function index(){
    	return view("index.homeaddress");
    }
}
