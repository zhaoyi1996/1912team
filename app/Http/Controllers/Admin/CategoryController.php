<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopSlideModel as Slide;
class CategoryController extends Controller
{
    //后台模块广告类型管理
    public function index(){
         // 接搜索值
         $sl_url = request()->sl_url;
         $where = [];
         if($sl_url){
              $where[] = ['sl_url','like',"%$sl_url%"];
         }
         $where[] = ['is_del','=',1];
         $slide = Slide::where($where)->paginate(2);
         $query = request()->all();
    	return view("admin.category.index",['slide'=>$slide,'query'=>$query]);
    }

    // 轮播图添加展示
    public function create(){
      //  dd(123);
        return view('admin.category.create');
    }

    // 上传图片
    public function getsun(){
        //文件上传
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

    // 执行添加
    public function story(request $request){
        // echo 1234;
     // 接Id 
        $sl_url=Request()->sl_url;
        $sl_weight=Request()->sl_weight;
        $sl_log=Request()->sl_log;
        $is_show=Request()->is_show;
        $data = [
            'sl_url' => $sl_url,
            'sl_weight' => $sl_weight,
            'sl_log' => $sl_log,
            'is_show' => $is_show
        ];
        //屏蔽_token
        $post = request()->except(['_token']);
        // dd($post);
        $post['add_time']=time(); //添加时间
        $res = Slide::insert($post);
        
        if($res){
            return ['code'=>0000,'msg'=>'添加成功'];
        }else{
            return ['code'=>0001,'msg'=>'添加失败'];
        }
    }

    // 修改视图
    public function edit($id){
        // 根据id获取一条数据
        $slide = Slide::find($id);
        return view('admin.category.edit',['slide'=>$slide]);
    }

    //执行修改
    public function update(Request $request){
    
         // 接Id 
         $sl_url=Request()->sl_url;
         $sl_weight=Request()->sl_weight;
         $sl_log=Request()->sl_log;
         $is_show=Request()->is_show;
         $sl_id = Request()->sl_id;
         $data = [
             'sl_url' => $sl_url,
             'sl_weight' => $sl_weight,
             'sl_log' => $sl_log,
             'is_show' => $is_show
         ];

         $res = Slide::where('sl_id',$sl_id)->update($data); 
        //  dd($res);
        if($res){
            return ['code'=>0000,'msg'=>'修改成功'];
        }else{
            return ['code'=>0001,'msg'=>'修改失败'];
        }
       
    }

    // 逻辑删除
    public function destroy($id){
        $data = New Slide;
        $data = Slide::find($id);
        $data->is_del=2;
        $res = $data->save();
        // dd($res);
        return redirect('/admin/category');

    }





}

