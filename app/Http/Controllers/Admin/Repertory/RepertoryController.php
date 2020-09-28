<?php

namespace App\Http\Controllers\Admin\Repertory;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttrvalBlog;
use App\Model\GoodsModel;
use App\Models\AttrModel;
use App\Models\AttrvalModel;
use App\Models\RepModel;
use Illuminate\Http\Request;

class RepertoryController extends Controller
{
    /**
     * 库存添加
     */
    public function create(){
        #查询商品属性
        $attr_data=AttrModel::where('is_del',1)->get();
        #查询商品属性值
        $attrval_data=AttrvalModel::where('is_del',1)->get();
        #获取下拉商品
        $goods_data=GoodsModel::select('goods_id','goods_name')->get();
//        dd($goods_data);
        return view('admin.repertory.create',['attr_data'=>$attr_data,'attrval_data'=>$attrval_data,'goods_data'=>$goods_data]);
    }
    /**
     * 库存确认添加
     */
    public function add(){
        $data=request()->post();
        $goods_id=request()->goods_id;
//        $goods_id=request()->goods_id;
        $data['attrval_id']=explode(',',$data['pinjie_id']);
        $attrval_data=AttrvalModel::whereIn('attrval_id',$data['attrval_id'])->leftjoin('shop_attr','shop_attrval.attr_id','=','shop_attr.attr_id')->get()->toArray();
        $rep_data=[];
        $pinjie='';
        foreach($attrval_data as $k=>$v){
            $pinjie.=$v['attr_id'].":".$v['attrval_id'].',';
            $rep_data['attr']=json_encode([$pinjie],true);
//            $pinjie='';
        }
        $rep_data['goods_id']=$goods_id;
        $rep_data['add_time']=time();
        $rep_data['goods_store']=$data['num'];
        $rep_data['goods_price']=$data['price'];
        //数据入库
        $res=RepModel::insert($rep_data);
       if($res){
           return ['code'=>0000,'msg'=>'库存添加成功'];
       }else{
           return ['code'=>0001,'msg'=>'库存添加失败'];
       }
    }
    /**
     * 库存确认添加----多条数据
     */
    public function adds(){
        $data=request()->except('goods_id');
//        dd($data);
        $goods_id=request()->goods_id;
        $attrval_id=[];
        $attrval_data=[];
        $num=[];
        $price=[];
        foreach($data as $k=>$v){
            if($k=='pinjie_id'){
                $attrval_id=explode('/',$v);
                array_pop($attrval_id);
                foreach($attrval_id as $key=>$vv){
                    $vv=trim($vv,',');
                    $attrval_id[$key]=explode(',',$vv);
                    //查询属性值信息
                    $attrval_data[]=AttrvalModel::whereIn('attrval_id',$attrval_id[$key])->get()->toArray();
                }
            }else if($k=='num'){
                $num=explode(',',$v);
            }else{
                $price=explode(',',$v);
            }
        }
        $rep_data=[];
        $attr=[];
        $pinjie_id='';
        $id=[];
        for($i=0;$i<count($attrval_data);$i++){
            foreach($attrval_data as $k=>$v){
                if($k==$i){
                    foreach($v as $kk=>$vv){
                        $pinjie_id.=$vv['attr_id'].":".$vv['attrval_id'].',';
                        $id[$kk]=$pinjie_id;
                        $pinjie_id='';
                    }
                }
            }
//            dd($goods_id);
            $time[$i]=time();
            $attr=json_encode($id,true);
            $rep_data['goods_id']=$goods_id;
            $rep_data['attr']=$attr;
            $rep_data['add_time']=time();
            $rep_data['goods_store']=$num[$i];
            $rep_data['goods_price']=$price[$i];
            $attr=[];
            $time=[];
            $res=RepModel::insert($rep_data);
            $rep_data=[];
            if($i==count($attrval_data)-1){
                if($res){
                    return ['code'=>0000,'msg'=>'库存添加成功'];
                }else{
                    return ['code'=>0001,'msg'=>'库存添加失败'];
                }
            }
        }

//        foreach($attrval_data as $k=>$v){
//            foreach($v as $kk=>$vv){
//                $pinjie[$kk] = $vv['attr_id'].":".$vv['attrval_id'].',';
//            }
//        }
//        $rep_data['attr']=[json_encode($pinjie,true)];
//        $rep_data['add_time']=[time()];
//        foreach($num as $key=>$val){
//            $rep_data['goods_store'].=[$val];
//        }
//        foreach($price as $keys=>$vals){
//            $rep_data['goods_price'].=[$vals];
//        }

//        dd($rep_data);
//        $res=RepModel::insert($rep_data);
//            if($res){
//                return ['code'=>'0000','msg'=>'库存添加成功'];
//            }else{
//                return ['code'=>'0000','msg'=>'库存添加失败'];
//            }

    }
    /**
     * 库存展示
     */
    public function index(){

    }
    /**
     * 库存修改
     */
    public function edit( $id ){

    }
    /**
     * 库存确认修改
     */
    public function update( $id ){

    }
    /**
     * 库存删除
     */
    public function del( $id ){

    }
    /**
     * 规格处理--笛卡尔积
     *
     */
    public function specification( Request $request){
        $id=$request->id;
//        dd($id);
        $goods_id=$request->goods_id;
//        dd($goods_id);
//        $id=$id['id'];
        $id=rtrim($id,',');
        $id=explode(',',$id);
        #获取商品数据
        $goods_data=GoodsModel::select('goods_id','goods_name')->where('goods_id',$goods_id)->first()->toArray();
//        dd($goods_data);
        $attrval_data=AttrvalModel::whereIn('attrval_id',$id)->get()->toArray();

        $attr_id=[];
        foreach($attrval_data as $v){
            $attr_id[]=$v['attr_id'];
        }
        $attr_id=array_unique($attr_id);
        $attr_data=AttrModel::whereIn('attr_id',$attr_id)->get()->toArray();
        $arr1=[];
        $arr2=[];
        $arr3=[];
        $arr4=[];
        foreach($attr_data as $val){
            if($val['attr_id']==2){
                foreach($attrval_data as $value){
                    if($value['attr_id']==2){
                        $arr1[]=$value;
                    }
                }
            }
        }
        foreach($attr_data as $val){
            if($val['attr_id']==3){
                foreach($attrval_data as $value){
                    if($value['attr_id']==3){
                        $arr2[]=$value;
                    }
                }
            }
        }
        foreach($attr_data as $val){
            if($val['attr_id']==4){
                foreach($attrval_data as $value){
                    if($value['attr_id']==4){
                        $arr3[]=$value;
                    }
                }
            }
        }
        foreach($attr_data as $val){
            if($val['attr_id']==5){
                foreach($attrval_data as $value){
                    if($value['attr_id']==5){
                        $arr4[]=$value;
                    }
                }
            }
        }
//       $arr=array_merge_recursive($arr1,$arr2,$arr3,$arr4);
//        print_r($arr);
//        exit;
        $arr[0]=$arr1;
        $arr[1]=$arr3;
        $arr[2]=$arr2;
        $arr[3]=$arr4;
//        dd($arr);
        $arr_id=[];
        foreach($arr as $k=>$vvv){
//            dump($vvv);
            foreach($vvv as $key=>$vv){
                $arr_id[$k][]=$vv['attrval_id'];
            }
        }

//        $attrval=array_unique($attrval);

//        $arr=array_merge($attrval_data,$attr_data);
        //获取笛卡尔积最终结果
//        dd($arr_id);
        $res=$this->cartesian($arr_id);
//        dd($res);
        $data=[];
        foreach($res as $k=>$v){
//            $str .=  $v;
            $v=explode(',',$v);
            $data[]=AttrvalModel::whereIn('attrval_id',$v)->get()->toArray();
        }
//        dd($goods_data);
        return ['attr_data'=>$attr_data,'data'=>$data,'goods_data'=>$goods_data];

//
//        //拼接属性
//        $html = "";
//        $add="";
//        foreach($attr_data as $v){
//            $add.="<th class='sorting'>".$v['attr_name']."</th>";
//        }
//        //拼接属性值
//        $attrval_val=[];
//        foreach($res as $v){
//            $v=explode(',',$v);
//            $attrval_val[]=AttrvalModel::whereIn('attrval_id',$v)->get()->toArray();
//        }
//        $attrval_html='';
//        foreach($attrval_val as $v){
//            foreach($v as $vv){
//                $attrval_html.="<td>".$vv['attrval_name']."</td>";
//            }
//        }
//        $attrval_html.="<td>".
//                "<input class='form-control'  placeholder='价格'>".
//            "</td>".
//            "<td>".
//                "<input class='form-control' placeholder='库存数量'>".
//            "</td>";
//                $add.="<th class='sorting'>库存数量</th>"."<th class='sorting'>价格</th>";
//                $html.="<table class='table table-bordered table-striped table-hover dataTable'>".
//                "<thead id='attr'>".
//                "<tr>".
//                    $add;
//                "</tr>".
//                "</thead>".
//                "<tbody>".
//                "<tr>".
//                    $attrval_html;
//                "</tr>".
//                "</tbody>".
//            "</table>";
//
//
//        return $html;
//        dd($arr);

    }
    /**
     ** 实现二维数组的笛卡尔积组合
     ** $arr 要进行笛卡尔积的二维数组
     ** $str 最终实现的笛卡尔积组合,可不写
     ** @return array
     **/
    function cartesian( $arr ,$str = array()){
        //去除第一个元素
        $first = array_shift($arr);
//        dd($first);
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
