<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PowPost;
use App\Model\ShopPowerModel;


class PowController extends Controller
{
    //权限添加
    public function create(){
    	return view("rbac.pow.create");
    }
    //执行添加 
    public function store(PowPost $request){
    	//接值
    	$pow_name = $request->post('pow_name');
    	$pow_desc = $request->post("pow_desc");
    	$pow_url = $request->post("pow_url");
        $power = new ShopPowerModel();
        $power->pow_name = $pow_name;
        $power->pow_desc=$pow_desc;
        $power->pow_url=$pow_url;
        $power->pow_add_time=time();
        if($power->save()){
            header("refresh:2,url=/admin/rbac/pow/list");
        }else{
            header("refresh:2,url=/admin/rbac/pow/create");
        }
    }
    // 权限展示
    public function list(){
        // 接受搜索的值
        $pow_name = request()->pow_name;
        // 拼接搜索where条件
        $where = [];
        if($pow_name){
            $where[] = ["pow_name","like","%$pow_name%"];
        }


        //查询数据根据添加时间倒序展示
        $pow = ShopPowerModel::where($where)->orderBy('pow_add_time','desc')->paginate(5);
    	return view("rbac.pow.list",['pow'=>$pow,'pow_name'=>$pow_name]);
    }
    public function del($id){
        $res = ShopPowerModel::where('pow_id',$id)->delete();
        if($res){
            echo "删除成功";
            header('refresh:3,url=/admin/rbac/pow/list');
        }
    }
    public function upd($id){
        $pow = ShopPowerModel::where('pow_id',$id)->first();
        return view("rbac.pow.upd",['pow'=>$pow]);
    }
    public function update($id){
        //接值
        $pow_name = request()->post("pow_name");
        $pow_desc = request()->post("pow_desc");
        $pow_url = request()->post("pow_url");
        $data = [
            'pow_name'=>$pow_name,
            'pow_desc'=>$pow_desc,
            'pow_url'=>$pow_url,
            'pow_add_time' => time()
        ];

        $res = ShopPowerModel::where('pow_id',$id)->update($data);
        if($res!==false){
            return redirect("/admin/rbac/pow/list");
        }

    }
}
