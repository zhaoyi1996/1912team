<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;
use App\Models\GoodsModel;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //展示
    public function goods(Request $request){
        //总条数
        $nums = GoodsModel::where(['goods_type'=>1])->count();
        //当前页
        $page=(int)request()->get('page') ? (int)request()->get('page') : 1;
        // echo $page;
        //每页显示条数
        $num=5;
        //总页数
        $pages = ceil($nums/$num);
        //偏移量
        $offer = ($page-1)*$num;
        $data = Redis::get("goods_".$page);
        if(!$data){
            echo "=DB==";
            $data=GoodsModel::where(['goods_type'=>1])->offset($offer)->limit($num)->get();
            //序列化
            $data = serialize($data);
            Redis::setex('goods_'.$page,60,$data);
        }
        // 反序列化
        $data = unserialize($data);
        $str='';
        for($i=1;$i<=$pages;$i++){
            $str.='<a href="/goods?page='.$i.'">第'.$i.'页</a>';
        }
        return view("goods.index",['data'=>$data,'str'=>$str]);
        // $goods = Redis::get("goods_".$pa);
        // $where = ['goods_type'=>'1'];
        // if(!$goods){
        //     echo "===Db";
        //     $goods = GoodsModel::where($where)->paginate(5);
        //     //序列化
        //     $goods = serialize($goods);
        //     Redis::setex('goods_'.$pa,60,$goods);
        // }
        // $goods = unserialize($goods);
        // return view("goods.index",['data'=>$goods]);
    }
    public function create(){
        return view("goods.goods");
    }
    public function store(Request $request){
        //接值
        $goods_name = $request->post('goods_name');
        $goods_content = $request->post("goods_content");
        $goods_price = $request->post("goods_price");
        $goods_num = $request->post("goods_num");
        $goodsinfo = GoodsModel::where('goods_name',$goods_name)->first();
        if(!$goods_name){
            return json_encode(['code'=>'1','msg'=>'商品名称不可为空']);
        }
        if($goodsinfo){
            return json_encode(['code'=>'1','msg'=>'商品名称已存在']);
        }
        if(!$goods_price){
            return json_encode(['code'=>'1','msg'=>'商品价格不可为空']);
        }
        if(!$goods_content){
            return json_encode(['code'=>'1','msg'=>'商品介绍不可为空']);
        }
        if(!$goods_num){
            return json_encode(['code'=>'1','msg'=>'商品库存不可为空']);
        }
        $goods = new GoodsModel();
        $goods->goods_name=$goods_name;
        $goods->goods_price = $goods_price;
        $goods->goods_content = $goods_content;
        $goods->goods_num = $goods_num;
        if($goods->save()){
            return json_encode(['code'=>'0','msg'=>'ok']);
        }else{
            return json_encode(['code'=>'1','msg'=>'添加失败']);
        }
    }
    //即点即改 库存
    public function updatenum(Request $request){
        //接值
        $_value = $request->post("_value");
        $goods_num = $request->post("goods_num");
        $goods_id = $request->post("goods_id");
        $res = GoodsModel::where('goods_id',$goods_id)->update([$goods_num=>$_value]);
        if($res===1){
            echo "ok";
        }else{
            echo "no";
        }
    }
    // 逻辑删除
    public function delete($id){
        $res = GoodsModel::where('goods_id',$id)->update(['goods_type'=>0]);
        if($res){
            echo "ok";
        }else{
            echo "no";
        }
    }
    public function upd($id){
        $data = GoodsModel::where('goods_id',$id)->first();
        return view("goods.upd",['data'=>$data]);
    }
    public function update(Request $request,$id){
        //接值
        $goods_name = $request->post('goods_name');
        $goods_content = $request->post("goods_content");
        $goods_price = $request->post("goods_price");
        $goods_num = $request->post("goods_num");
        $goodsinfo = GoodsModel::where('goods_name',$goods_name)->first();
        if(!$goods_name){
            return json_encode(['code'=>'1','msg'=>'商品名称不可为空']);
        }
        if($goodsinfo){
            return json_encode(['code'=>'1','msg'=>'商品名称已存在']);
        }
        if(!$goods_price){
            return json_encode(['code'=>'1','msg'=>'商品价格不可为空']);
        }
        if(!$goods_content){
            return json_encode(['code'=>'1','msg'=>'商品介绍不可为空']);
        }
        if(!$goods_num){
            return json_encode(['code'=>'1','msg'=>'商品库存不可为空']);
        }
        $res = GoodsModel::where('goods_id',$id)->update(['goods_name'=>$goods_name,'goods_content'=>$goods_content,'goods_price'=>$goods_price,'goods_num'=>$goods_num]);
        if($res!==false){
            header("refresh:2,url=/goods");

            echo "修改成功";

        }
    }
}

