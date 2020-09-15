<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowController extends Controller
{
    //权限添加
    public function create(){
    	return view("rbac.pow.create");
    }
    // 权限展示
    public function list(){
    	return view("rbac.pow.list");
    }
}
