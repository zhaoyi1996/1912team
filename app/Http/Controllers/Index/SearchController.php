<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopCollectModel;
use App\Model\BrandModel;
use App\Model\GoodsModel;
use App\Model\CategoryModel;use Illuminate\Support\Facades\Redis;


class SearchController extends Controller
{
    //产品列表页
    public function index(Request $request){
        //商品条件搜索查询展示
        $brand_id = $request->brand_id;
        $cate_id=$request->cate_id;
        $price=$request->price;
        $prices=[];
        $whereBetween=[];
        $where=[];
        $brand_goods=[];
        if(!empty($brand_id)){
            $where[]=['brand_id','=',$brand_id];
        }
        if(!empty($price)){
            if(strstr($price,'及以上')){
                $price=str_replace('及以上','',$price);
                $where[]=['goods_price','>=',$price];
                $brand_goods = GoodsModel::where($where)->get();
            }else{
                $price=str_replace(',','',$price);
                $price=explode('-',$price);
                foreach($price as $k=>$v){
                    $prices[$k]=intval($v);
                }
                $brand_goods = GoodsModel::where($where)->whereBetween('goods_price',[$prices[0],$prices[1]])->get();
            }
        }else{
            $brand_goods = GoodsModel::where($where)->get();
        }
        
        if(!empty($cate_id)){
            //根据分类id查询数据
            $cate_where=[['cate_id','=',$cate_id],['is_del','=',1]];
            $cate_info=CategoryModel::where($cate_where)->first();
            if(!empty($cate_info)){
                $cate_ids=CategoryModel::select('cate_id')->where('pid',$cate_info->cate_id)->get()->toArray();
                if(!empty($cate_ids)){
                    foreach($cate_ids as $k=>$v){
                        foreach($v as $vv){
                            $ids[$k]=$vv;
                            $ids[$k+1]=$cate_info->cate_id;
                        }
                    }
                    $brand_goods=GoodsModel::whereIn('cate_id',$ids)->get();
                }            
            }
        }
        //根据(商品)表来查询品牌表(brand_img,),分类表(goods_price,pid)
        $GoodsCate =  GoodsModel::select('is_hot','goods_id','shop_brand.brand_id','brand_img','pid','goods_price')
                    ->leftjoin('shop_category','shop_goods.cate_id','=','shop_category.cate_id')
                    ->leftjoin('shop_brand','shop_goods.brand_id','=','shop_brand.brand_id')
                    ->orderBy("goods_price","desc")
                    ->get()
                    ->toArray();  
        //  dd($GoodsCate);

        // 查询所有数据
        $GoodsCateOne =  GoodsModel::select('is_hot','goods_id','brand_img','pid','goods_price')
                    ->leftjoin('shop_category','shop_goods.cate_id','=','shop_category.cate_id')
                    ->leftjoin('shop_brand','shop_goods.brand_id','=','shop_brand.brand_id')
                    ->orderBy("goods_price","desc")
                    ->first();
        // dd($GoodsCateOne);

        $max=$GoodsCateOne['goods_price'];
        // dd($GoodsCate['goods_price']);
        
        // 定义空数组
         $array = [];
         // 转为一维数组/去重
        //  $GoodsCates = $GoodsCate->toArray();
         foreach($GoodsCate as $k=>$v){
            $array[]=$v['brand_id'];
            $array=array_unique($array);
         };
        $array_img=BrandModel::whereIn('brand_id',$array)->get()->toArray();
       
        $cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();

        //3-- 获取价格区间
        // $where =[];
       $price_qujian= $this->getPriceSection($max);

       $goods_hot = $GoodsCateOne['is_hot'];
        //dd($goods_hot);
        // 调用无限极分类
        $cateAll = CategoryModel::get()->Toarray();//转化为数组
        // 调用分类
        $res = $this->gatCate3($cateAll);
                    #查询热卖商品    目前是做简单一点的（将所有商品数据中销量最高的展示出来）10.3
        $hot_data=GoodsModel::orderBy('shop_sales','desc')->limit(4)->get();
        

        
    	return view("index.search.search",['GoodsCate'=>$GoodsCate,'res'=>$res,'price_qujian'=>$price_qujian,'cate'=>$cate,'goods_hot'=>$goods_hot,'array_img'=>$array_img,'brand_goods'=>$brand_goods,'hot_data'=>$hot_data]);

    }

    public function clicks(){
        $brand_id = request()->post("brand_id");
        $where = [
            'brand_id'=>$brand_id
        ];
        $Goods = GoodsModel::where($where)->get();
        return ['goods'=>$Goods];
        // // dd($Goods);
        // return view('index.search',['Goods'=>$Goods]);
    }
    //正品秒杀
    public function seckillIndex(Request $request){
    	return view("index.seckill-index");
    }
    

     // 获取价格区间
     public function getPriceSection($max_price){
        $price=$max_price/4;
        // dd($price);
        $priceInfo=[];//一维数组
        // 左边 0  1000 2000  3000  4000
        // 右边  999 1999   2999  3999
        for($i=0;$i<=3;$i++){
            $start=$price*$i;
           $end=($i+1)*$price-0.01;
           $priceInfo[]=number_format($start,2).'-'.number_format($end,2);
            
        }
        $priceInfo[]=$max_price.'及以上';
        // print_r($priceInfo);
        return $priceInfo;
    }


    //收藏
    public function collect(){
    	$goods_id=request()->goods_id;
    	// dd($goods_id);
    	// $session=session('');
    	// dd($goods_id);
       //user_id给固定的值   接收商品ID  时间
       $array=[
       		"user_id"=>5,
       		"goods_id"=>request()->goods_id,
       		"collect_time"=>time()
       ];
       //将数据入库
       $goods=ShopCollectModel::insert($array);
       if($goods){
       		$arr=[
       			"code"=>111,
       			"message"=>"收藏成功",
       		];
       }	
       //返回JSON串

        return json_decode($arr);
    	$session=session('User_Info');
       	$collect=new ShopCollectModel();
    	$collect->goods_id=$goods_id;
    	$collect->user_id=$session->user_id;
    	$collect->collect_time=time();
    	// dd($collect);
    	$res=$collect->save();
    	// dd($res);	
    	if($res){
    		return ['code'=>0000,'msg'=>'加入收藏成功'];
    	}else{
    		return ['code'=>0001,'msg'=>'加入收藏失败'];
    	}
       
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





   


}
