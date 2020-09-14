<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopTypeModel;

class TemplateController extends Controller
{
    //后台商品模板展示
    public function index(){
    	return view("admin.template.index");
    }
    /**
     * 商品类型模板添加
     */
    public function create(){
        $data=request()->post();
        $data['add_time']=time();
        $res=ShopTypeModel::insert($data);
        if($res){
            return ['code'=>0,'msg'=>'添加成功'];
        }else{
            return ['code'=>1,'msg'=>'添加失败'];
        }
    }
}
