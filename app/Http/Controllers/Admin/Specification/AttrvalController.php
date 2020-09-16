<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\Controller;
use App\Models\AttrvalModel;
use Illuminate\Http\Request;

class AttrvalController extends Controller
{
    /**
     * 商品属性值添加
     */
    public function create(){
        return  view('admin.template.attrval.create');
    }
    /**
     * 商品属性值确认添加
     */
    public function add(){
        $data=request()->except('_token');
        $data['add_time']=time();
        $res=AttrvalModel::insert($data);
        if($res){
            return redirect('/admin/template/attrval/index');
        }else{
            return redirect('/admin/template/attrval/add');
        }
    }

    /**
     * 商品属性值展示
     *
     */
    public function index(  ){
        //查询商品属性信息
        $where=[
            ['is_del','=',1]
        ];
        $ShopData=AttrvalModel::where($where)->paginate(3);
        return view('admin.template.attrval.index',['ShopData'=>$ShopData]);
    }

    /**
     * 商品属性值修改
     * @param $id
     */
    public function edit( $id ){
        $where=[
            ['attrval_id','=',$id]
        ];
        $attr_info=AttrvalModel::where($where)->first();
        return view('admin.template.attrval.edit',['attr_info'=>$attr_info]);
    }

    /**
     * 商品属性值确认修改
     * @param $id
     */
    public function update( $id ){
        $data=request()->except('_token');
        $data['add_time']=time();
        $where=[
            ['attrval_id','=',$id]
        ];
        $res=AttrvalModel::where($where)->update($data);
        if($res){
            return redirect('/admin/template/attrval/index');
        }else{
            return redirect('/admin/template/attrval/edit/'.$id);
        }
    }
}
