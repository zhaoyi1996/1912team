<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
   //商品后台规格展示
	public function index(){
		return view("admin.secification.index");
	}
}
