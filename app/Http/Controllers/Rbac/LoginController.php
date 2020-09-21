<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        DB::connection()->enableQueryLog(); // 开启查询日志
    }

    public function login(){
    	return view("rbac.login.login");
    }
}
