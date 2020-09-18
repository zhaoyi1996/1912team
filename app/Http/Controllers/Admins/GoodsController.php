<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandModel;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
class GoodsController extends Controller
{
    public function index(){
        $brand=BrandModel::all();
        $res=CategoryModel::all();
//        dd($cate);die;
        // 无限极分类
        $cate=$this->getres($res);
        return view('admins.goods.index',['brand'=>$brand,'cate'=>$cate]);
    }

//    执行添加
//public function create(Request $request){
//    $data=$request->except("_token");
//
//    // 非空，字节长度
//    $request->validate([
//        'goods_name' => 'required|max:60',
//        'goods_price'=>'required',
//        'goods_title'=>'required'
//    ],[
//        'goods_name.max' => "字节长度不得超过60位！",
//        'goods_name.required' => "商品名称不能为空！",
//        'goods_price.required' => "商品价格不能为空！",
//        'goods_title.required' => "商品标题不能为空！"
//    ]);
//    $res=GoodsModel::all();
//    $goods=GoodsModel::insertGetId($data);
////    dd($goods);
//    if($goods){
//        return view('admins.goodslist.index',['res'=>$res]);
//    }
//}

    //无限极分类
public function getres($res,$pid=0,$level=1){
static $info=[];
    foreach($res as $k=>$v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $info[]=$v;
            $this->getres($res,$v['cate_id'],$v['level']+1);
        }
    }
    return $info;
}

//    删除
    public function delete($id){
        $res=GoodsModel::where('goods_id',$id)->delete();
        if($res){
            echo json_encode(['code'=>0,'msg'=>'删除成功']);
        }

    }

    public function edit($id){
        $brand=BrandModel::all();
       $cate= CategoryModel::all();
       $res= GoodsModel::where(['goods_id'=>$id])->first();
    return view('admins.goods.edit',['res'=>$res,'brand'=>$brand,'cate'=>$cate]);
    }

    public function update($id){

        $post=request()->all();
//        dd($post);
//         非空，字节长度
        request()->validate([
            'goods_name' => 'required|max:60',
            'goods_price'=>'required',
            'goods_title'=>'required'
        ],[
            'goods_name.max' => "字节长度不得超过60位！",
            'goods_name.required' => "商品名称不能为空！",
            'goods_price.required' => "商品价格不能为空！",
            'goods_title.required' => "商品标题不能为空！"
        ]);
        $res=GoodsModel::where('goods_id',$id)->update($post);
        if($res!==false){
            return redirect('/admins/goodslist');
        }
    }
//文件上传
    public function uploads(Request $request){
        $arr = $_FILES['Filedata'];
        //  dd($arr);
        $tmpName = $arr['tmp_name'];
        $ext  = explode(".",$arr['name'])[1];
        $newFileName=md5(uniqid()).".".$ext;
        $newFilePath="./upload/".Date("Y/m/d/");
        if(!is_dir($newFilePath)){
            mkdir($newFilePath,0777,true);
        }
        // dd($newFilePath);
        $newFilePath2=$newFilePath.$newFileName;
        move_uploaded_file($tmpName, $newFilePath2);
        $newFilePath = trim($newFilePath2,".");
        echo $newFilePath;
    }

//    ajax接收值执行添加
    public function img(Request $request){
        $data=$request->all();
//        添加时间
        $data['goods_add_time']=time();

    // 非空，字节长度
//    $request->validate([
//            'goods_name' => 'required|max:60',
//            'goods_name'=>'unique',
//            'goods_price'=>'required',
//            'goods_title'=>'required'
//        ],[
//            'goods_name.max' => "字节长度不得超过60位！",
//            'goods_name.required' => "商品名称不能为空！",
//            'goods_name.unique' => "商品名称也存在！",
//            'goods_price.required' => "商品价格不能为空！",
//            'goods_title.required' => "商品标题不能为空！"
//        ]);
    $goods=GoodsModel::insert($data);

    if($goods){
        return (['code'=>0000,'msg'=>'添加成功']);
    }else{
        return (['code'=>0001,'msg'=>'添加失败']);
    }
    }
}
