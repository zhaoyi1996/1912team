<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\ShopUserModel;

class LoginController extends Controller
{
    //前台登录
    public function login(){
    	return view("index.login.login");
    }
    //前台执行登录
    public function logindo(Request $request){
    	//接值
    	$user_name = $request->post("user_name");
    	$user_pwd = $request->post("user_pwd");

    	if(!$user_name){
    		echo json_encode(['code'=>1,'msg'=>'请填写管理员名称']);die;
    	}
    	if(!$user_pwd){
    		echo json_encode(['code'=>1,'msg'=>'请填写管理员密码']);die;
    	}

    	$user = ShopUserModel::where('user_name',$user_name)->first();
    	if(!$user){
    		echo json_encode(['code'=>1,'msg'=>'管理员不存在']); die;
    	}
    	if($user_pwd!==decrypt($user->user_pwd)){
    		echo json_encode(['code'=>1,'msg'=>'密码错误']); die;
    	}

		session(['userInfo'=>$user->user_id]);

    	echo json_encode(['code'=>0,'msg'=>'登陆成功']); 

    }
    
}
