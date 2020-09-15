<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // rbac角色添加
    public function create(){
    	return view("rbac.role.create");
    }
    // rbac角色展示
    public function list(){
    	return view("rbac.role.list");
    }
}
