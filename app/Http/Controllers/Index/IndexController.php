<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

use App\Model\BrandModel;
use App\Model\GoodsModel;
use App\Model\ShopLadverModel;
use Illuminate\Http\Request;

use App\Model\AnnouModel;
use App\Model\CategoryModel;
use Illuminate\Support\Facades\Redis;

use App\Model\ShopSlideModel;
class IndexController extends Controller
{

    // 首页
    public function index(){
$goods_id=request()->goods_id;
        //公告
        $res2=AnnouModel::leftjoin("shop_goods","shop_annou.goods_id","=","shop_goods.goods_id")->get();
        // 调用无限极分类
        $cateAll = CategoryModel::get()->Toarray();//转化为数组
        // dd($cateAll);
        // 调用分类
        $res = $this->gatCate3($cateAll);
        // dd($res);
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();
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

        //   轮播图
        $slide=ShopSlideModel::where('is_del','1')->limit(5)->get();
        #查询小广告信息
       $LadverWhere=[
            ['la_del','=',1]
        ];
        $ladver_data=ShopLadverModel::where($LadverWhere)->first();
        #查询今日推荐     ----排序方法是最近存入库的几件商品
        $recomWhere=[
            ['del_id','=',1]
        ];
        $recom_data=GoodsModel::where($recomWhere)->orderBy('goods_add_time','desc')->limit(4)->get();
        #将数据存入redis
//        $recom_key="recom_data";
//        Redis::set($recom_key,json_encode($recom_data,true));
//        expireat($recom_key);
        #获取猜你喜欢 --根据用户最近浏览记录和购买记录  推荐相应分类下

        #获取底部品牌logo信息
        $BrandWhere=[
            ['brand_del','=',1]
        ];
        $brand_data=BrandModel::where($BrandWhere)->limit(10)->get();
//        dd($brand_data);
        #猜你喜欢

        //查询分类
        $tao_data=CategoryModel::get();
        //调用获取id的方法
        $tao_info=$this->gatCate4($tao_data);

        $tao_2ji=[];
        foreach($tao_info as $k=>$v){
            $tao_2ji[$v->cate_id]=$v->son;
        }
//        dd($tao_2ji);
//        dd($tao_data);
    	return view("index.index.index",['ladver_data'=>$ladver_data,'recom_data'=>$recom_data,'cate'=>$cate,'res'=>$res,'brand_data'=>$brand_data,'slide'=>$slide,'res2'=>$res2,'tao_2ji'=>$tao_2ji]);


 }

    // 无限极分类
    public function getCate($array,$pid=0){
        static $info=[];
        $info[$pid]=$pid;
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
    // 父级id--子级分类
    public function gatCate4($array,$pid=0){
        $tao_info=[];
        foreach ($array as $k =>$v) {
            if ($v['pid']==$pid) {
                $v['son']=$this->gatCate4($array,$v['cate_id']);
                $tao_info[]=$v;
            }
        }
        return $tao_info;
    }


}
