<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 管理员列表
    public function list(){
    	return view("rbac.admin.list");
    }
    // 管理员添加
    public function create(){
    	return view("rbac.admin.create");
    }
}
