<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopAdminModel;
use App\Model\ShopRoleModel;
use App\Model\ShopAdminRoleModel;

class AdminController extends Controller
{
    // 管理员列表
    public function list(){

        //接受搜索的值
        $admin_name = request()->admin_name;
        // echo $admin_name;
        // 拼接搜索where
        $where = [];
        if($admin_name){
            $where[] = ['admin_name',"like","%$admin_name%"];
        }
        
        // $admin = ShopAdminModel::leftjoin("shop_admin_role","shop_admin.admin_id","=","shop_admin_role.admin_id")->leftjoin("shop_role","shop_role.ro_id","=","shop_admin_role.ro_id")->get();
    	$admin = ShopAdminModel::where($where)->orderBy("admin_add_time","desc")->paginate(5);
        // dd($admin);
        $admins = ShopAdminRoleModel::leftjoin("shop_admin","shop_admin.admin_id","=","shop_admin_role.admin_id")->leftjoin("shop_role","shop_role.ro_id","=","shop_admin_role.ro_id")->get();
        // dd($admins);


        return view("rbac.admin.list",['admin'=>$admin,"admins"=>$admins,'admin_name'=>$admin_name]);
        
    }
    // 管理员添加
    public function create(){
    	return view("rbac.admin.create");
    }
    public function store(Request $request){
        $admin_name = $request->post("admin_name");
        $admin_pwd = $request->post("admin_pwd");
        if(!$admin_name){
            echo json_encode(['code'=>1,'msg'=>'管理员名称不可为空']);die;
        }
        if(!$admin_pwd){
            echo json_encode(['code'=>1,'msg'=>'管理员密码不可为空']);die;
        }
        $adm = ShopAdminModel::where('admin_name',$admin_name)->first();
        if($adm){
            echo json_encode(['code'=>1,'msg'=>'管理员名称已存在']);die;
        }
        $admin = new ShopAdminModel();
        $admin->admin_name=$admin_name;
        $admin->admin_pwd = encrypt($admin_pwd);
        $admin->admin_add_time=time();
        if($admin->save()){
            echo json_encode(['code'=>0,'msg'=>'ok']);die;
        }else{
            echo json_encode(['code'=>1,'msg'=>'添加失败']);die;
        }
    }
    public function del($id){
        $res = ShopAdminModel::where('admin_id',$id)->delete();
        if($res){
//            echo json_encode(['code'=>0,'msg'=>'删除成功']);die;
            return redirect("/admin/rbac/admin/list");
        }else{
            echo json_encode(['code'=>1,'msg'=>'删除失败']);die;
        }
    }
    public function upd($id){
        $admin = ShopAdminModel::where('admin_id',$id)->first();
        $admin_pwd = $admin->admin_pwd = decrypt($admin->admin_pwd);
        return view("rbac.admin.upd",['admin'=>$admin,'admin_pwd'=>$admin_pwd]);
    }
    public function update($id){
        $admin_name = request()->post("admin_name");
        $admin_pwd = request()->post("admin_pwd");
        $data = [
            'admin_name'=>$admin_name,
            'admin_pwd' => encrypt($admin_pwd),
            'admin_add_time'=>time()
        ];
        $res = ShopAdminModel::where('admin_id',$id)->update($data);
        if($res!==false){
            return redirect("/admin/rbac/admin/list");
        }
    }
    public function fus($id){
        // echo $id;
        $role = ShopRoleModel::get();
        return view("rbac.admin.fus",['role'=>$role,'admin_id'=>$id]);
    }
    public function fus2(){
        $check = request()->post("checkboxarr");
        $admin_id = request()->post("admin_id");

        foreach($check as $k=>$v){
            $admin = new ShopAdminRoleModel();
            $admin->admin_id = $admin_id;
            $admin->ro_id = $v;
            $admin->rolepower_time=time();
            $res = $admin->save();
        }
        if($res){
            echo json_encode(['code'=>1,'msg'=>'ok']);
        }
    }
}
