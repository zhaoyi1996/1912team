<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\sendCode;
use Illuminate\Support\Facades\Mail;
use App\Model\ShopUserModel;
use Symfony\Component\HttpFoundation\Session\Session;
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
    
    //注册
    public function reg(){
        return view("index.reg.reg");
    }
    //执行注册
    public function regdo(){
        //接值
        $user_name = request()->post("user_name");
        $user_email = request()->post("user_email");
        $user_pwd = request()->post("user_pwd");
        $user_pwds = request()->post("user_pwds");
        $user_code = request()->post("user_code");
        // echo $user_pwds;
        // $sessionInfo = request()->session()->has("sessionInfo");
        //  dd($sessionInfo);die;
        $session = new Session;
        $usercode = $session->get("user_code");
        // dd($usercode);
        // dd($sessionInfo);
        //验证/邮箱号
        if($user_email==""){
            echo "邮箱必填";die;
        }else{
            $where=[
                ["user_email","=",$user_email]
            ];
            //查询条数
            $count=ShopUserModel::where($where)->count();
            //如果查询到的条数大于0，代表已被注册
            if($count>0){
                echo "该邮箱已存在";die;
            }
        }

       
        $pwd='/^[0-9a-z]{6,18}$/i';
        if($user_pwd==""){
            echo "密码必填";die;
        }else if(!preg_match($pwd,$user_pwd)){
            echo "密码格式有误";die;
        }
        // if($user_code!==$usercode){
        //     echo "验证码错误";die;
        // }
        $user_pwd = encrypt($user_pwd);
        $user = new ShopUserModel();
        $user->user_name=$user_name;
        $user->user_add_time = time();
        $user->user_pwd=$user_pwd;
        $user->user_email=$user_email;
        if($user->save()){
            echo "添加成功";
        }
        
        // if($res){
        //     return redirect("/login/login")->with("zhu","注册成功，请登录");
        // }else{
        //     return redirect("/login/reg")->with("zhu","注册失败，请重新注册");
        // }





    }
    //获取邮箱  发送邮箱验证码
    public function sendEmail(){
        $user_email = request()->post("user_email");
        // 判断邮箱非空  格式   唯一性
        $reg = '/^[0-9a-z]{5,}@[0-9a-z]{2,5}\.com$/';
        if(empty($user_email)){
            echo json_encode(['code'=>1,'msg'=>"邮箱不可为空"]);die;
        }else if(preg_match($reg,$user_email)<1){
            echo json_encode(['code'=>1,'msg'=>"输入邮箱格式有误"]);die;
        }else{
            //查询数据库查看是否已存在
            $res = ShopUserModel::where("user_email",$user_email)->count();
            if($res>0){
                echo json_encode(['code'=>1,'msg'=>"邮箱已存在"]);die;
            }
        }
        // 发送邮件
        $code=rand(100000,999999);
        
        // echo $res;
        
            // 将值存入cookie 
            // cookie("sendInfo",['user_email'=>$user_email,"user_code"=>$code,"user_time"=>time()]);
             // ['user_email'=>$user_email,"user_code"=>$code,"user_time"=>time()];
            
            // request()->session()->put('sessionInfo',$user_email);

            $session = new Session;
            $session->set("user_code",$code);

            Mail::to($user_email)->send(new sendCode($code));
            echo json_encode(['code'=>0,'msg'=>"发送成功"]);die;
        
    }


    // //邮箱
    // public function sendEmail(Request $request){
    //     $email=request()->user_email;
    //     //php验证邮箱
    //     $reg='/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
    //     //dd(preg_match($reg,$email));
    //     if(!preg_match($reg,$email)){
    //         echo json_encode(['code'=>1,'msg'=>'邮箱格式有误']);exit;
    //     }
    //     //随机验证码
    //     $code=rand(100000,999999);
    //     //发送的手机号
    //     $this->sendByEmail($email,$code);
    //     // session(['code'=>$code]);
    //     $sessionInfo = ["user_email"=>$email,"user_code"=>$code,"user_time"=>time()];
    //     session(["sessionInfo"=>$sessionInfo]);

    //     request()->session()->save();
    //     echo json_encode(['code'=>0,'msg'=>'发送成功']);exit;
    // }

    // //发送邮箱
    // public function sendByEmail($email,$code){
    //     Mail::to($email)->send(new SendCode($code));
    // }



}
