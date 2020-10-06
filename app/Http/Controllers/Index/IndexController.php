<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use AopClient;
use AlipayOpenPublicTemplateMessageIndustryModifyRequest;
use App\Model\CartModel;
use App\Model\ShopLtdModdel;
use App\Model\GoodsModel;
use App\Model\BrandModel;
use App\Model\ShopLadverModel;
use Illuminate\Http\Request;
use App\Model\CategoryModel;
use Illuminate\Support\Facades\Redis;
use App\Model\AnnouModel;
use App\Model\ShopSlideModel;

class IndexController extends Controller
{

    // 首页
    public function index(){
        $goods_id=request()->goods_id;
        $wheretao=[
            'is_del'=>1
        ];
        //公告
        $res2=AnnouModel::where($wheretao)->leftjoin("shop_goods","shop_annou.goods_id","=","shop_goods.goods_id")->get();
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
        //查询小广告信息

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
//        查询商品表
        $goods=GoodsModel::all();
//        dd($goods);die;

    	return view("index.index.index",compact('ladver_data','recom_data','cate','res','brand_data','slide','res2','tao_2ji','goods'));
 }

    // 导航顶级分类
    public function cateNav(){
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();
        $goods=GoodsModel::all();
        $count=CartModel::count();

        return view('index.layouts.index',['cate'=>$cate,'goods'=>$goods,'count'=>$count]);
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




    /**
     * 支付宝支付测试
     */
    public function getAliPay(){
        $data='';
        dd($data);
    }
    /**
     * 接受支付异步
     */
    public function getAliPayjieguo(){
        $data=request()->post();
        dd($data);
    }
}
