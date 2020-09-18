<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopRoleModel;
use App\Model\ShopPowerModel;
use DB;
use App\Model\ShopRolepowerModel;
class RoleController extends Controller
{
    // rbac角色添加
    public function create(){
        //查询权限表
        $pow = DB::table("shop_power")->get();
        // dd($pow);
    	return view("rbac.role.create",['pow'=>$pow]);
    }
    //角色执行添加
    public function store(Request $request){
        //接值
        $role_name = $request->post('role_name');
        // $check = $request->post("checkboxarr");

        if(!$role_name){
            echo json_encode(['code'=>'1','msg'=>'角色名称不可为空']);die;
        }
        $role = ShopRoleModel::where('ro_name',$role_name)->first();
        if($role){
            echo json_encode(['code'=>'1','msg'=>'角色名称已存在']);die;
        }
       


        // //将获取到的值加入角色权限关联表
        // $rolepower = new ShopRolepowerModel();
        // $rolepower->pow_id = $check;

        $ro = new ShopRoleModel();
        $ro->ro_name = $role_name;
        $ro->ro_add_time = time();
        if($ro->save()){
            echo json_encode(['code'=>'0','msg'=>'添加成功']);die;
        }else{
            echo  json_encode(['code'=>'1','msg'=>'添加失败']);die;
        }

    }
    // rbac角色展示
    public function list(){


        //接受搜索的值
        $ro_name = request()->ro_name;

        // 拼接搜索where条件
        $where = [];
        if($ro_name){
            $where[] = ["ro_name","like","%$ro_name%"];
        }

        // $ro = ShopRoleModel::leftjoin('shop_rolepower','shop_role.ro_id','=','shop_rolepower.ro_id')
        //             ->leftjoin('shop_power','shop_rolepower.pow_id','=','shop_power.pow_id')
        //             ->get();
                   // dd($ro);
        $ro = ShopRoleModel::where($where)->orderBy("ro_add_time","desc")->paginate(5);
        // $ro=ShopRoleModel::get();
        // $rp=[];
        // foreach ($ro as $k => $v) {
        //     $rp[]=ShopRolepowerModel::where(['ro_id'=>$v->ro_id])->first();
        // }
        // $p=[];
        //  foreach ($rp as $k => $v) {
        //     if($v!=null){
        //         foreach ($v as $kk => $vv) {
        //             dd($vv);
        //             $p[]=ShopPowerModel::where(['pow_id'=>$vv->pow_id])->first();
        //         }
        //     }
        // }
        // dd($p);

        // $arr=[];
        // foreach($ro as $k=>$v){
        //     $arr[]=$v['ro_id'];    
        // }
        // $str=implode(',', $arr);
        
        $ros = ShopRolepowerModel::leftjoin("shop_power","shop_power.pow_id","shop_rolepower.pow_id")
                        ->leftjoin("shop_role","shop_role.ro_id","shop_rolepower.ro_id")
                        ->get();
        // foreach($ro as $k=>$v){
        //     foreach($ros as $key=>$val){
        //         if($v['ro_id']==$val['ro_id']){
        //             $array=array_merge($ro,$ros);
        //         }
        //     }
        // }
        // $array=array_merge($ro,$ros);
        // dd($array);
        // $array = array_unique($array);
        // dd((object)$array);
        // foreach($array as $k=>$v){
        //     $a = array_unique($array[$k][$v]['ro_id']);
        //     dd($a);
        // }
        // $array = array_unique($array);
        // dd($array);
        // $array = (object)$array;
        // dd($array);
        
    	return view("rbac.role.list",['ro'=>$ro,'ros'=>$ros,"ro_name"=>$ro_name]);

    }
    public function upd($id){

        $role = ShopRoleModel::where('ro_id',$id)->first();
        return view("rbac.role.upd",['role'=>$role]);
    }
    public function del($id){
        $res = ShopRoleModel::where('ro_id',$id)->delete();
        if($res){
            return redirect("/admin/rbac/role/list");
        }
    }
    public function update($id){
        //接值
        $ro_name = request()->post("ro_name");
        $ro_add_time = time();
        $data = [
            'ro_name'=>$ro_name,
            'ro_add_time'=>$ro_add_time
        ];
        $res = ShopRoleModel::where('ro_id',$id)->update($data);
        if($res!==false){
            return redirect("/admin/rbac/role/list");
        }

    }
    public function fus($id){
        
        $pow = ShopPowerModel::get();

        return view("rbac.role.fus",['pow'=>$pow,'id'=>$id]);
    }
    public function fus2(){
        $check = request()->post("checkboxarr");
        $ro_id = request()->post("ro_id");


        foreach($check as $k=>$v){
            $rolepower = new ShopRolepowerModel();
            $rolepower->pow_id=$v;
            $rolepower->ro_id = $ro_id;
            $rolepower->ropower_time=time();
            $res = $rolepower->save();
        }
        if($res){
            echo json_encode(['code'=>1,'msg'=>'ok']);
        }
   
    }
}
