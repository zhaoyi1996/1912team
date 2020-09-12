<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //后台商品模板展示
    public function index(){
    	return view("admin.template.index");
    }
}
