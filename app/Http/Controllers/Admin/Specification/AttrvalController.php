<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\Controller;
use App\Models\AttrvalModel;
use Illuminate\Http\Request;
use App\Http\Requests\AttrvalBlog;

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
    public function add(AttrvalBlog $request){
        $data=$request->except('_token');
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
    public function update(AttrvalBlog $request, $id ){
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

    /**
     ** 实现二维数组的笛卡尔积组合
     ** $arr 要进行笛卡尔积的二维数组
     ** $str 最终实现的笛卡尔积组合,可不写
     ** @return array
     **/
    function cartesian( $arr = array(array(1,3,4,5),array(3,5,7,9),array(76,6,1,0)),$str = array()){
        //去除第一个元素
        $first = array_shift($arr);
//        dd($first);
        dd($arr);
        //判断是否是第一次进行拼接
        if(count($str) > 1) {
            foreach ($str as $k => $val) {
                foreach ($first as $key => $value) {
                    //最终实现的格式 1,3,76
                    //可根据具体需求进行变更
                    $str2[] = $val.','.$value;
                }
            }
        }else{
            foreach ($first as $key => $value) {
                //最终实现的格式 1,3,76
                //可根据具体需求进行变更
                $str2[] = $value;
            }
        }
        //递归进行拼接
        if(count($arr) > 0){
            $str2 = $this->cartesian($arr,$str2);
        }
        //返回最终笛卡尔积
        return $str2;$cartesian_product = $this->cartesian($arr);
//        print_r($cartesian_product);

    }

}
