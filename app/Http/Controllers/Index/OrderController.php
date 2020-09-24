<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class OrderController extends Controller
{
    
    public function index(Request $request){

    	return view("index.order.order_info");
    }

}
