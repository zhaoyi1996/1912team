<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Brand;
use App\Models\RepModel;
use App\Model\CategoryModel;
use App\Models\AttrvalModel;
use App\Models\AttrModel;

class ItemController extends Controller
{
 
    public function index(Request $request,$id){
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();
//         dd($id);
     //  接收商品id
        $goods_id=$request->goods_id;
        // dump($goods_id);
        $where=[
            'goods_id'=>$id
        ];

        $goods=GoodsModel::where($where)->first();
        $ddd='';
        if(!empty($goods)){
            $ddd= explode("|",$goods->goods_imgs);
        }
        #查询商品sku库存
        #先查询这件商品有多少种类，以及每个种类有多少个库存
        $attr_ids=[];
        $val_data=[];
        $rep_data=RepModel::where('goods_id',$id)->get();
        foreach($rep_data as $k=>$v){
            $v->attr=json_decode($v->attr);
            foreach($v->attr as $vv){
                $v->attr=explode(',',rtrim($vv,','));
                foreach($v->attr as $vvv){
                    $attr_id=explode(':',$vvv)[0];
                    $attrval_id=explode(':',$vvv)[1];
                    //双表联查获取属性和属性值信息
                    $val_data[$k]=AttrvalMOdel::where('attrval_id',$attrval_id)->leftjoin('shop_attr','shop_attrval.attr_id','=','shop_attr.attr_id')->first();
                    // dd($v);
                    $attr_ids[]=$attr_id;
                    $val_data[$k]['add_time']=$v->add_time;
                    $val_data[$k]['goods_id']=$v->goods_id;
                    $val_data[$k]['goods_store']=$v->goods_store;
                    $val_data[$k]['goods_price']=$v->goods_price;
                }  
            }
        }
        $attr_ids=array_unique($attr_ids);
        $attr_name=AttrModel::whereIn('attr_id',$attr_ids)->get();
        $attrval_name=AttrvalModel::whereIn('attr_id',$attr_ids)->get();
        #获取商品最小价格
        $min_price=RepModel::where('goods_id',$id)->orderBy('goods_price')->first();
        #获取商品最大价格
        $max_price=RepModel::where('goods_id',$id)->orderBy('goods_price','desc')->first();
    	return view("index.item.item",['goods'=>$goods,'goods_imgs'=>$ddd,'cate'=>$cate,'attr_name'=>$attr_name,'val_data'=>$val_data,'attrval_name'=>$attrval_name,'min_price'=>$min_price,'max_price'=>$max_price]);
    }
    public function price(){
       $attr=request()->str;
       $attr=json_encode([implode(',',$attr)]);
       $attr_data=RepModel::where('attr',$attr)->first();
        if(!empty($attr_data)){
            return ['code'=>0000,'num'=>$attr_data->goods_store,'price'=>$attr_data->goods_price];
        }else{
            return ['code'=>0001,'msg'=>'不存在此sku，请重新选择'];
        }
        






    }















    //接收详情页的sku
    public function ajaxitem(){
        $res = request()->all();
        $data = implode(":",$res["attr_id"]);
        $where = [
            "goods_id"=>$res["goods_id"],
            "is_del"=>"1",
                ];
        $attr_val = attr_val::where($where)->get();
        foreach ($attr_val as $k => $v) {
            $spe_name = $v["spe_name"];
            $wheres = [
                "goods_id"=>$res["goods_id"],
                "spe_name"=>$spe_name
                      ];
            if($data==$spe_name){
                //echo "321";
                $info = attr_val::where($wheres)->first(); 
                return $info;
            }  
        }
    }

}
