<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AnnouModel as Annou;
use App\Model\GoodsModel as Goods;
class ContentController extends Controller
{
    //展示
    public function index(){
        // 接搜索值
          $an_name = request()->an_name;
          $where = [];
          if($an_name){
               $where[] = ['an_name','like',"%$an_name%"];
          }
          $where[] = ['is_del','=',1];
          $annou = Annou::where($where)->paginate(2);
          $query = request()->all();
    	return view("admin.content.index",['annou'=>$annou,'query'=>$query]);
    }
       // 公告添加展示
    public function create(){
        $goods = Goods::get();
       return view('admin.content.create',['goods'=>$goods]);
      }

    //  公告执行添加
    public function story(request $request){
        // 接视图ajax传来的值
        $an_name = Request()->an_name;
        $an_url = Request()->an_url;
        $an_desc = Request()->an_desc;
        $an_st_price = Request()->an_st_price;
        $an_st_num = Request()->an_st_num;
        // 把值转化成数组
        $data = [
            'an_name' => $an_name,
            'an_url' => $an_url,
            'an_desc' => $an_desc,
            'an_st_price' => $an_st_price,
            'an_st_num' => $an_st_num,
        ];
      
        // 屏蔽_token
        $post = request()->except(['_token']);
        $post['an_st_time']=time(); //添加时间
        $res = Annou::insert($post);
        // dd($res);
        if($res){
            return ['code'=>0000,'msg'=>"公告添加成功"];
        }else{
            return ['code'=>1111,'msg'=>'公告添加失败'];
        }
    }

    
    public function edit($id){
        // 根据id查新一条数据
        $annou = Annou::find($id);
        return view('admin.content.edit',['annou'=>$annou]);
    }
    
    // 执行修改
    public function update(Request $request)
    {
           // 接视图ajax传来的值
           $an_name = Request()->an_name;
           $an_url = Request()->an_url;
           $an_desc = Request()->an_desc;
           $an_st_price = Request()->an_st_price;
           $an_st_num = Request()->an_st_num;
           $an_id = Request()->an_id;
           // 把值转化成数组
           $data = [
               'an_name' => $an_name,
               'an_url' => $an_url,
               'an_desc' => $an_desc,
               'an_st_price' => $an_st_price,
               'an_st_num' => $an_st_num
           ];
         
        $res = Annou::where('an_id',$an_id)->update($data); 
        if($res){
            return ['code'=>0000,'msg'=>'修改成功'];
        }else{
            return ['code'=>0001,'msg'=>'修改失败'];
        }
    }

    // 逻辑删除
    public function destroy($id){
        // dd(1234);
        $data = New Annou;
        $data = Annou::find($id);
        $data->is_del=2;
        $res = $data->save();
        // dd($res);
        return redirect('/admin/content');

    }
    

}
