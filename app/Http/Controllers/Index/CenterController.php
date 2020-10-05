<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\CenterModel;
use App\Model\ChorModel;
use App\Model\AreaModel;
class CenterController extends Controller
{
    //个人信息
    public function homeSettingInfo(){
    	$chor=ChorModel::get();	
    	$user_id=session("User_Info");
    	$where=[
    		["user_id","=",$user_id["user_id"]]
    	];
    	$center=CenterModel::where($where)->first();
    	return view("index.home-setting-info",['chor'=>$chor,'center'=>$center]);
    }
    //添加
    public function add(){
    	$data=request()->post();
    	// dd($data);
    	if($data['center_name']==''){
    		echo "不能为空";
    	}
    	$user_id=session("User_Info");
    	$where=[
    		["user_id","=",$user_id["user_id"]]
    	];
    	$center=CenterModel::where($where)->update(["center_name"=>$data['center_name'],"center_tel"=>$data['center_tel'],"center_dady"=>$data['center_dady'],"center_type"=>$data['center_type'],"chor_id"=>$data['chor_id']]);
    	return redirect("/index/homeSettingInfo");
    }
    

}