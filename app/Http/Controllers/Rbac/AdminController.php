<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopAdminModel;

class AdminController extends Controller
{
    // 管理员列表
    public function list(){
        $admin = ShopAdminModel::orderBy('admin_add_time')->get();
    	return view("rbac.admin.list",['admin'=>$admin]);
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
}
