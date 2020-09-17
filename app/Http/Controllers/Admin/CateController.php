<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
use DB;
use Illuminate\Support\Facades\Redis;
class CateController extends Controller
{
    //商品后台分类管理

    // 分类展示页面--执行展示redis
    public function index(){
        $data = New Cate;
        $res = Cate::where("is_del",1)->get();
    	return view("admin.cate.index",['res'=>$res]);
    }

    // 分类添加跳转视图
    public function create(){
        $res = Cate::all();
        // dd($res);
        // 调用无限极 分类
        $cate=$this->getres($res);
        // dd($cate);
        // 跳转到添加视图添加
        return view("admin.cate.create",['cate'=>$cate]);
    }

    // ajax即点即改
    public function cateup(){
     // 接商品Id 
     $cate_id=Request()->cate_id;
     $filed=request()->field;
     $_value=request()->_value;
    //  dd($_value);
     $cate=Cate::find($cate_id);
    //  dd($cate);
     $cate->$filed=$_value;
     $res=$cate->save();
     return json_encode(['code'=>'0000','msg'=>'修改成功']);
    // if($res==true){
    //     return json_encode(['code'=>'0000','msg'=>'修改成功']);
    // }else{
    //     return json_encode(['code'=>'1111','msg'=>'修改失败']);
    // }
    }

    // 无限极分类
    public function getres($res,$pid=0,$level=1)
    {
        // dd($res);
        // echo 1;die;
        static $info=[];
        foreach ($res as $k => $v){
            if($v['pid']==$pid){
                $v['level'] = $level;
                $info[] = $v;
                // var_dump($v);exit;
                $this->getres($res,$v['cate_id'],$v['level']+1);
            }
        }
        return $info;
    }

    //执行添加
    public function store(request $request){
        // 非空，字节长度
        $request->validate([
            'cate_name' => 'required|max:60'
        ],[
            'cate_name.required' => "分类名称不能为空！",
            'cate_name.max' => "字节长度不得超过60位！"
        ]);
        //屏蔽_token
        $post = request()->except(['_token']);
        // dd($post);
        $post['add_time']=time(); //添加时间
        $res = Cate::insert($post);
        if($res){
            return redirect('/admin/cate');
        }
    }

    // 修改跳转视图
    public function edit($id){
        // 根据id获取一条数据
        $cate = Cate::find($id);
        $cates = Cate::all();
        // dd($cates);

        $catesdata = $this->getres($cates);
        // dd($catesdata);
        return view('admin.cate.edit',['cate'=>$cate,'cates'=>$catesdata]);

    }

    // 执行修改
    public function update(Request $request, $id)
    {
        $cate_name = $request->post('cate_name');
        $pid = $request->post('pid');
        $cate_show = $request->post('cate_show');
        $cate_nav_show = $request->post('cate_nav_show');
        $data = [
            'cate_name'=>$cate_name,
            'pid' => $pid,
            'cate_show' => $cate_show,
            'cate_nav_show' => $cate_nav_show,
            'upd_time' => time()
        ];
        $res = Cate::where('cate_id',$id)->update($data); 
        // $cate = Cate::update($id); 
        // dd($res);
        if($res!==false){
            return redirect('/admin/cate');
        }
    }

    // 删除
    public function destroy($id){
        $data = New Cate;
        $data = Cate::find($id);
        $data->is_del=2;
        $data->upd_time = time();
        // $count = Cate::where("cate_id",$id)->count();
        // // dd($count);
        // dd($data);
        // if($data>0){
        //     return redirect("cate/index")->with("msg","该分类下有子分类");
        // }
        $res = $data->save();
        return redirect('/admin/cate');
    }

}
