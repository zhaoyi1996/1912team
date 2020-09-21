<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopAdminModel;


class LoginController extends Controller
{
    // public function __construct() {
        // DB::connection()->enableQueryLog(); // 开启查询日志
    // }

    public function login(){
    	return view("rbac.login.login");
    }

    public function logindo(Request $request){
    	//接值
    	$user_name = $request->post("user_name");
    	// echo $user_name;die;
    	$user_pwd = $request->post("user_pwd");

    	if(!$user_name){
    		echo json_encode(['code'=>1,'msg'=>'请填写管理员名称']);die;
    	}
    	if(!$user_pwd){
    		echo json_encode(['code'=>1,'msg'=>'请填写管理员密码']);die;
    	}

    	$user = ShopAdminModel::where('admin_name',$user_name)->first();
    	// dd($user);
    	if(!$user){
    		echo json_encode(['code'=>1,'msg'=>'管理员不存在']); die;
    	}
    	// dd(decrypt($user->user_pwd));
    	if($user_pwd!==decrypt($user->admin_pwd)){
    		echo json_encode(['code'=>1,'msg'=>'密码错误']); die;
    	}

		session(['userInfo'=>$user]);

    	echo json_encode(['code'=>0,'msg'=>'登陆成功']); 
    }
}
