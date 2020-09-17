<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\Controller;
use App\Models\AttrModel;
use Illuminate\Http\Request;
use App\Http\Requests\AttrBlog;

class AttrController extends Controller
{
    /**
     * 商品属性添加
     */
    public function create(){
        return  view('admin.template.attr.create');
    }
    /**
     * 商品属性确认添加
     */
    public function add(AttrBlog $request){
        $data=$request->except('_token');
        $data['add_time']=time();
        $res=AttrModel::insert($data);
        if($res){
            return redirect('/admin/template/attr/index');
        }else{
            return redirect('/admin/template/attr/add');
        }
    }
    /**
     * 商品属性展示
     */
    public function index(){
        //查询商品属性信息
        $where=[
            ['is_del','=',1]
        ];
        $ShopData=AttrModel::where($where)->paginate(3);
        return view('admin.template.attr.index',['ShopData'=>$ShopData]);
    }

    /**
     * 商品属性修改
     * @param $id
     */
    public function edit( $id ){
        $where=[
            ['attr_id','=',$id]
        ];
        $attr_info=AttrModel::where($where)->first();
        return view('admin.template.attr.edit',['attr_info'=>$attr_info]);
    }

    /**
     * 商品属性确认修改
     * @param $id
     */
    public function update( AttrBlog $request, $id ){
        $data=$request->except('_token');
        $data['add_time']=time();
        $where=[
            ['attr_id','=',$id]
        ];
        $res=AttrModel::where($where)->update($data);
        if($res){
            return redirect('/admin/template/attr/index');
        }else{
            return redirect('/admin/template/attr/edit/'.$id);
        }
    }

    /**
     * 商品属性逻辑删除
     * @param $id
     */
    public function del( $id ){
        $where=[
            ['attr_id','=',$id]
        ];
        $data=AttrModel::where($where)->update(['is_del'=>2]);
        if($data){
            return redirect('/admin/template/attr/index');
        }else{
            return redirect('/admin/template/attr/index');
        }
    }
}
