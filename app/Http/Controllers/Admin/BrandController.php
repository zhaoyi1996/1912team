<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //商品品牌展示
    public function index(){
    	return view("admin.brand.index");
    }
}
