<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CateController extends Controller
{
    //商品后台分类管理
    public function index(){
    	return view("admin.cate.index");
    }
}
