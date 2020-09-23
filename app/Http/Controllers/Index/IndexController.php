<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use App\Model\ShopLadverModel;
use Illuminate\Http\Request;
use App\Model\BrandModel as Brand;
use App\Model\GoodsModel as Goods;
use App\Model\CategoryModel as cate;
class IndexController extends Controller
{

    // 首页
    public function index(){
        // 调用无限极分类
        $cateAll = Cate::get()->Toarray();//转化为数组
        // dd($cateAll);
        // 调用分类
        $res = $this->gatCate3($cateAll);
        // dd($res);
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = Cate::where($cate_pid)->get();
        // dd($cate);


        // $goods= Goods::all();
        // $where = [];
        // // dd($goods);
        // // 根据商品表来查询品牌表 id
        // $brand_id=$goods->where($where)->count("brand_id");
        // // dd($brand_id);
        // // 对品牌id去重
        // $brand_id=array_unique($brand_id);
        // $brand = New Brand;
        // // 给品牌表一个where条件
        // $Brandwhere=[
        //    ['brand_id','in',$brand_id]
        // ];
        //    // 查询所有的品牌表id
        // $brandInfo=$brand->where($Brandwhere)->select();
        // dd($brandInfo);
   
        //    // print_r($where);
        //    //3-- 获取价格区间
        //    $max_price=$goods_model->where($where)->value('max(goods_price)');
        //    // echo  $goods_model->getLastsql();die;
        //    $priceInfo=$this->getPriceSection($max_price);
   


        //查询小广告信息
        $cateInfo = Cate::all();
        $LadverWhere=[
            ['la_del','=',1]
        ];
        $ladver_data=ShopLadverModel::where($LadverWhere)->first();
        #查询今日推荐     ----排序方法是最近存入库的几件商品
        $recom_data=GoodsModel::orderBy('goods_add_time','desc')->limit(4)->get();
    	return view("index.index.index",['ladver_data'=>$ladver_data,'recom_data'=>$recom_data,'cate'=>$cate,'res'=>$res]);
    }

    // 无限极分类
    public function getCate($array,$pid=0){
        static $info=[];
        $info[$pid]=$pidgatCate3;
        foreach ($array as $key=>$value){
            if ($value['pid']==$pid) {
                $this->getCate($array,$value['cate_id']);
            }
        }
        return $info;
    }

    // 父级id--子级分类
    public function gatCate3($array,$pid=0){
        $info=[];
        foreach ($array as $k => $v) {
            if ($v['pid']==$pid) {
                $v['son']=$this->gatCate3($array,$v['cate_id']);
                $info[]=$v;
            }
        }
        return $info;
    }




}
