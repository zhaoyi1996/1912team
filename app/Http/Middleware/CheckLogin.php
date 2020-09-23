<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\ShopAdminRoleModel;
use App\Model\ShopRolepowerModel;
use App\Model\ShopPowerModel;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     //取出session值
    //     $user = session("userInfo");
    //     if(!$user){
    //         return redirect("/admin/login");
    //     }
    //     return $next($request);
    // }
     public function handle($request, Closure $next)
    {
        //获取到登录时候存入session的数据
        $admininfo=$request->session()->get("userInfo");
        // dd($admininfo);
        if(!$admininfo){
            return redirect("/admin/login");
        }else{
            // echo "1111";exit;
            // dd($admininfo);
            //获取到当前的路由地址
            $user_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            // dd($user_url);
            // dd($_SERVER['HTTP_HOST']);
            // dd($_SERVER['REQUEST_URI']);
            $int = trim(strrchr($user_url,'/'),'/');
            // dd($int);
            // dd($int);
            //获取到当前的方法
            // dd($int);
            

            // if(strpos ($user_url,"?")){
            //     //存在时
            //     $str=strpos ($user_url,"?");
            //     $len=strlen($user_url);
            //     $user_url=substr($user_url,0,$str);
            //     // dd($user_url);   
            // }else{
            //     $user_url=$user_url;
            // }


            // dd($user_url);
            if($int>0){
                $str =strrchr($user_url,'/');
                $len =strlen($str);
                $num = strlen($user_url);
                $count = $num - $len;
                $user_url = substr($user_url,0,$count);
                // dd($user_url);
                // dd($user_url);
            }else if(strpos ($user_url,"?")){
                //存在时
                $str=strpos ($user_url,"?");
                $len=strlen($user_url);
                $user_url=substr($user_url,0,$str);
                // dd($user_url);
            }else{
                $user_url=$user_url;
            }
           echo $user_url;
           // echo $user_url;die;
            if($user_url == "http://www.1912team.com/admin/list"){
                return $next($request);
            }
            // dd('1111');
            $admin_role = new ShopAdminRoleModel();
            $role_ction = new ShopRolepowerModel();
            // dd($admin_role);
            $where = [
                ['admin_id', '=', $admininfo['admin_id']]
            ];
            // dd($where);
            $role_info = $admin_role::where($where)->get();
            // dd($role_info);
            $aa="";
            foreach ($role_info as $k => $v){
                $role_id=$v['ro_id'];

                // dd($v);
               // echo $role_id;exit;
                $wherea = [
                    ['ro_id', '=', $role_id]
                ];
                $role_ction_info = $role_ction::where($wherea)->get();
                // dd($role_ction_info);
//                echo $role_power_info;
                foreach ($role_ction_info as $kk => $vv) {
//                    echo $vv['power_id'];echo "</br>";
                    // dd($vv);
                    $whereb = [
                        ['pow_id', '=', $vv['pow_id']]
                    ];
                    $ction_model = new ShopPowerModel();
                    
                    $ction_info = $ction_model::where($whereb)->get();
                    // dd($ction_info);
                    foreach ($ction_info as $kkk => $vvv) {
//                          echo $vvv['power_url'];echo "<br>";
//                           echo $user_url;
                        // dd($user_url);
                        // dd($vvv['pow_url']);
                            if ($_SERVER['REQUEST_URI'] == $vvv['pow_url']) {
                                $aa="true";
                            }
                    }
                }
        }
        
        if ($aa==="true") {
             return $next($request);
        }else{
            echo "<script>alert('你没有权限');window.history.go(-1);</script>";
        }

    }
}
}
