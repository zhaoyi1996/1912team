<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopFootModel as Foot;

class FootController extends Controller
{
    // 友情连接展示
    public function index(){
           // 接搜索值
           $foot_name = request()->foot_name;
           $where = [];
           if($foot_name){
               $where[] = ['foot_name','like',"%$foot_name%"];
               
           }
           $where[] = ['is_del','=',1];
        //    $where = ['is_del','=',1];
        //    dd($where);
           $data = Foot::where($where)->paginate(2);
        //    $data = Foot::where('is_del',1)->get();
        //    dd($data);
           $query = request()->all();
        return view('admin.foot.index',['data'=>$data,'query'=>$query]);
    }

    // 添加视图
    public function create(){
        return view('admin.foot.create');
    }

    // 执行添加
    public function story(){
         // 接视图ajax传来的值
         $foot_name = Request()->foot_name;
         $foot_url = Request()->foot_url;
         $foot_weight = Request()->foot_weight;
         // 把值转化成数组
         $data = [
             'foot_name' => $foot_name,
             'foot_url' => $foot_url,
             'foot_weight' => $foot_weight
         ];
        //  dd($data);
         // 屏蔽_token
         $post = request()->except(['_token']);
         $post['foot_time']=time(); //添加时间
         $res = Foot::insert($post);
        //  dd($res);
         if($res){
             return ['code'=>0000,'msg'=>"公告添加成功"];
         }else{
             return ['code'=>1111,'msg'=>'公告添加失败'];
         }
    }



    
    // 逻辑删除
    public function destroy($id){
        // dd(123);
        $data = New Foot;
        $data = Foot::find($id);
        // dd($data);
        $data->is_del=2;
        $res = $data->save();
        // dd($res);
        return redirect('/admin/foot');

    }


    // 修改视图
    public function edit($id){
        // 根据id获取一条数据
        $foot =Foot::find($id);
        // dd(1234);
        return view('admin.foot.edit',['foot'=>$foot]);
    }


      //执行修改
      public function update(Request $request){
           // 接视图ajax传来的值
           $foot_name = Request()->foot_name;
           $foot_url = Request()->foot_url;
           $foot_weight = Request()->foot_weight;
           $foot_id = Request()->foot_id;
           // 把值转化成数组
           $data = [
               'foot_id' => $foot_id,
               'foot_name' => $foot_name,
               'foot_url' => $foot_url,
               'foot_weight' => $foot_weight
           ];
    //    dd($data);   
        $res = Foot::where('foot_id',$foot_id)->update($data); 
        // dd($res);
       if($res){
           return ['code'=>0000,'msg'=>'修改成功'];
       }else{
           return ['code'=>0001,'msg'=>'修改失败'];
       }
      
   }


    
}