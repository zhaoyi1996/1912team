<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopRoleModel;

class RoleController extends Controller
{
    // rbac角色添加
    public function create(){
    	return view("rbac.role.create");
    }
    //角色执行添加
    public function store(Request $request){
        //接值
        $role_name = $request->post('role_name');
        if(!$role_name){
            echo json_encode(['code'=>'1','msg'=>'角色名称不可为空']);die;
        }
        $role = ShopRoleModel::where('ro_name',$role_name)->first();
        if($role){
            echo json_encode(['code'=>'1','msg'=>'角色名称已存在']);die;
        }

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
        $ro = ShopRoleModel::orderBy('ro_add_time')->get();
    	return view("rbac.role.list",['ro'=>$ro]);
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
}
