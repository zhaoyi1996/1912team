<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Model\ShopUserModel;


class RegController extends Controller
{
    //注册页面
    public function reg(){
    	return view("index.reg.reg");
    }
    //
   
    public function regdo(Request $request){
    	//接值
    	$user_name = $request->post("user_name");
    	$user_email = $request->post("user_email");
    	$user_pwd = $request->post("user_pwd");
    	$user_pwds = $request->post("user_pwds");
    	$user_code = $request->post("user_code");
    	//PHP验证
        // dd($user_email);
//        dd($user_email);
    	if($user_name==''){
    		echo json_encode(['code'=>1,'msg'=>'用户名不可为空']);die;
    	}
    	// 验证密码格式
    	$pwd='/^[0-9a-z]{6,18}$/i';
        if($user_pwd==""){
            echo json_encode(['code'=>1,'msg'=>'密码必填']);die;
        }else if(!preg_match($pwd,$user_pwd)){
            echo json_encode(['code'=>1,'msg'=>'密码格式有误']);die;
        }
    	if($user_pwds==''){
    		echo json_encode(['code'=>1,'msg'=>'用户确认密码不可为空']);die;
    	}
    	if($user_pwds!==$user_pwd){
    		echo json_encode(['code'=>1,'msg'=>'用户密码和确认密码不同']);die;
    	}
    	if($user_email==''){
    		echo json_encode(['code'=>1,'msg'=>'用户邮箱不可为空']);die;
    	}else{
            $where=[
                ["user_email","=",$user_email]
            ];
            //查询条数
            $count=ShopUserModel::where($where)->count();
            //如果查询到的条数大于0，代表已被注册
            if($count>0){
                echo json_encode(['code'=>1,'msg'=>'该邮箱已存在']);die;
            }
        }
    	if($user_code==''){
    		echo json_encode(['code'=>1,'msg'=>'用户验证码不可为空']);die;
    	}
    	$session = new Session;
    	// 获取发送的qq验证码
        $usercode = $session->get("user_code");
        //判断输入验证码是否跟发送的一致
        // if($user_code!==$usercode){
        // 	echo json_encode(['code'=>1,'msg'=>'验证码错误']);die;
        // }
        $key="1912team";
        $iv="aaaabbbbccccdddd";
//        $user_pwd=openssl_encrypt($user_pwd,'AES-256-CBC',$key,OPENSSL_RAW_DATA,$iv);
//        $user_pwd='n'.$user_pwd;
        $user_pwd=password_hash($user_pwd,PASSWORD_ARGON2ID);
//        $user_pwd = encrypt($user_pwd);
        $user = new ShopUserModel();
        $user->user_name=$user_name;
        $user->user_add_time = time();
        $user->user_pwd=$user_pwd;
        $user->user_email=$user_email;
//        dd($user);
        if($user->save()){
            echo json_encode(['code'=>0,"msg"=>'注册成功，请跳转登录页面']);die;
        }
    }

}
