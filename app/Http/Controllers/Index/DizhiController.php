<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 引入地址表model
use App\Model\DefaultModel;
use App\Model\AreaModel;

class DizhiController extends Controller
{
    ////地址中心
    public function index(){
    	//获取地址表数据进行展示
    	// 进行双表联查 查询地址表与goods表
    	// 拼接where
    	// 获取登录的用户id
    	$user_id = session('User_Info')['user_id'];
    	// dd($user_id);
    	$where = [
    		'user_id'=>$user_id,
    		'is_del'=>1,
    	];
    	$info = DefaultModel::where($where)->get();
    	// dd($info); 
    	$area_model = new AreaModel();
    	$info = DefaultModel::where($where)->get();
    	
    	return view("index.home.dizhi",['info'=>$info]);
    	
    }

    public function upd($id){
    	// 根绝id获取单条数据
    	$info = DefaultModel::where('fef_id',$id)->first();
        // dd($info);
    	return view("index.home.dizhiupd",['info'=>$info]);
    }
    //逻辑删除
    public function del($id){
    	$user_id  = session("User_Info")['user_id'];
    	$where = [
    		'fef_id'=>$id,
    	];
    	$res = DefaultModel::where($where)->update(['is_del'=>2]);
    	if($res){
    		return redirect("/index/home/dizhi");
    	}else{
    		return redirect("/index/home/dizhi");
    	}
    } 
    public function update($id){
    	$user_id = session("User_Info")['user_id'];
    	$where = [
    		'user_id'=>$user_id,
    	];

    	//接值
    	$user_name = request()->post("user_name");
    	$user_tel = request()->post("user_tel");
    	$minute = request()->post("minute");
    	$province = request()->post("province");
    	$city = request()->post("city");
    	$area = request()->post("area");
    	$fef_is_more = request()->post("fef_is_more");
    	// dd($fef_is_more);
    	$data = [
    		'user_name'=>$user_name,
    		'user_tel'=>$user_tel,
    		'minute'=>$minute,
    		'province'=>$province,
    		'city'=>$city,
    		'area'=>$area,
    		'fef_add_time'=>time(),

    	];
    	$res = DefaultModel::where("fef_id",$id)->update($data);
    	if($res!==false){
    		return redirect("index/home/dizhi");
    	}else{
    		return redirect("index/home/dizhi");
    	}
    }

    public function create(Request $request){
    	// echo "123";
    	//接值	
    	$user_id = session('User_Info')['user_id'];
    	$user_name = $request->post("user_name");
    	$user_tel = $request->post("user_tel");
    	$minute = $request->post("minute");
    	$province = $request->post("province");
    	$city = $request->post("city");
    	$area = $request->post("area");

    	//实例化model
    	$model = new DefaultModel();
    	$model->user_name=$user_name;
    	$model->user_tel=$user_tel;
    	$model->province=$province;
    	$model->city=$city;
    	$model->area=$area;
    	$model->minute=$minute;
    	$model->fef_add_time=time();
    	$model->fef_is_more=2;
    	$model->user_id=$user_id;
    	$res = $model->save();

    	if($res){
    		echo json_encode(['code'=>0,'msg'=>'添加成功']);
    	}else{
    		echo json_encode(['code'=>1,'msg'=>'添加失败']);
    	}

    }
    public function shezhi($fef_id){
    	//获取到用户id
		// dd($fef_id);
		// dd($fef_id);
		// 实例化model
		$address_model = new DefaultModel();
		// 获取到用户id
		$user_id = session("User_Info")['user_id'];
		// dd($user_id);
		// 根据用户id 和未被删除拼接
		$where = [
			['user_id','=',$user_id],
			['is_del','=',1]
		];

		$res = $address_model->where($where)->update(['fef_is_more'=>2]);

		// 根据收货地址的id把is_default改成1
		$addressWhere = [
			['fef_id','=',$fef_id]
		];

		// $user_url = "http://www.1912team.com/index/homeSettingAddress";

		$res2 = $address_model->where($addressWhere)->update(['fef_is_more'=>1]);
		// dd($res2);
		if($res2){
			return redirect("/index/home/dizhi");
		}else{
			return redirect("/index/home/dizhi");
		}
		
    }

}
