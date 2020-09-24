<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DefaultModel;
use App\Model\AreaModel;


class AddressController extends Controller
{
    //个人中心地址展示
    public function index(){

    	//获取地址数据
    	// $userinfo = $this->getAddressInfo();
    	// // print_r($userinfo);
    	// dd($userinfo);
    	//获取用户id
    	$user_id = $this->GetUserId();
    	// dd($user_id);
    	//拼写where条件is_del=1展示 =2已删除 
    	$where = [
    		['shop_user.user_id',$user_id],
    		['is_del',"=",1]
    	];
    	$area_model = new AreaModel();
    	$addressInfo = DefaultModel::leftjoin("shop_user","shop_default.user_id","=","shop_user.user_id")->where($where)->get();
    	foreach($addressInfo as $k=>$v){
			$addressInfo[$k]['province'] = $area_model->where("id",$v['province'])->value("name");
			$addressInfo[$k]['city'] = $area_model->where("id",$v['city'])->value("name");
			$addressInfo[$k]['area'] = $area_model->where("id",$v['area'])->value("name");
		}
		// dd($addressInfo);

    	return view("index.homeaddress",['info'=>$addressInfo]);
    }
    //个人中心地址添加
    public function create(){




    	return view("index.homeaddresscreate");
    }

    public function getAreaInfo($pid){
		// 实例化Areamodel
		$area_model = new AreaModel();
		// 根据pid拼接where
		$where = [
			['pid','=',$pid]
		];
		// 查询的sql语句
		return $area_model->where($where)->select();
	}
	// 三级联动 后两个
	public function getArea(){
		// 接受id
		$id = input("id");
		//根据id查询下一级数据
		$info = $this->getAreaInfo($id);
		$option = "<option value='0' selected>请选择...</option>";
		foreach ($info as $k => $v){
			$option .= "<option value='".$v['id']."'>".$v['name']."</option>";
		}
		echo $option;
	}

    // 个人中心地址执行添加
    public function store(){

    }
    //人人中心地址删除
    public function del($id){

    	// 软删除 根绝id修改表中is_del
    	$info = DefaultModel::where("fef_id",$id)->first();
    	// dd($info);
    	if($info->fef_is_more==1){
    		echo json_encode(['code'=>1,"msg"=>"默认收货地址不可删除"]);die;	
    	}
    	$res = DefaultModel::where("fef_id",$id)->update(['is_del'=>2]);
    	// echo $id;
    	if($res){
    		echo json_encode(['code'=>0,"msg"=>"删除成功"]);die;	
    	}else{
    		echo json_encode(['code'=>1,"msg"=>"默认收货地址不可删除"]);die;	
    	}
    }

    // 获取用户id
	public function GetUserId(){
		return session("User_Info")['user_id'];
	}


    // 获取收货地址列表数据
	public function getAddressInfo(){
		// 实例化个人中心model
		$address_model = new DefaultModel();
		// 获取到用户的id
		$user_id = $this->GetUserId();
		$where = [
			['user_id','=',$user_id]
		];
		$addressInfo = $address_model->where($where)->get();
		// dd($addressInfo);
		// 实例化省市区model
		$area_model = new AreaModel();

		// 处理省市区
		foreach($addressInfo as $k=>$v){
			$addressInfo[$k]['province'] = $area_model->where("id",$v['province'])->value("name");
			$addressInfo[$k]['city'] = $area_model->where("id",$v['city'])->value("name");
			$addressInfo[$k]['area'] = $area_model->where("id",$v['area'])->value("name");
		}
		return $addressInfo;
		// dd($addressInfo);
		// var_dump($addressInfo);
	}

	//设置默认收货地址
	public function moren($fef_id){
		//获取id
		// $fef_id = request()->get("fef_id");
		// 实例化model
		$address_model = new DefaultModel();
		// 获取到用户id
		$user_id = $this->getUserId();
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
		if($res2){
			return redirect("/index/homeSettingAddress");
		}else{
			return redirect("/index/homeSettingAddress");
		}
	}
	public function upd($default_id){
		// 接收id
		// $default_id = input("default_id");
		// if(empty($default_id)){
		// 	echo "请选择要编辑的id";die;
		// }
		// 根据收货地址id查询一条数据
		$where = [
			['default_id','=',$default_id]
		];
		
		// 实例化收货地址表model
		$default_model = new DefaultModel();
		$defaultInfo = $address_model->where($where)->first();

    	// 查询所有的省份 用来作为第一个下拉菜单
		$provinceInfo = $this->getAreaInfo(0);
		// 查询市当前省份下的市  作为第二个下拉框的值
		$cityInfo = $this->getAreaInfo($defaultInfo['province']);
		dd($cityInfo);
		// 查询区/县  当前市下的区和县 作为第三个下拉框的值
		$areaInfo = $this->getAreaInfo($defaultInfo['city']);

	}
}
