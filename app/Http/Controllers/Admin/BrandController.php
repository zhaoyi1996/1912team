<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    //商品品牌展示
    public function index(Request $request){
    	//$res=new Brand;
        $where=[
            ["brand_del","=",1]
        ];
    	$data=Brand::where($where)->get();
    	//dd($data);
    	return view("admin.brand.index",['data'=>$data]);
    }
    public function test(){
    	$data=request()->all();
    	//dd($data);	
    	$res=new Brand;

          // 文件上传判断
        //$data['brand_img']=$this->upload('brand_img');
        //dd($data);
    	$res->brand_name=$data['brand_name'];
        $res->brand_img=$data['brand_img'];
        $res->brand_url=$data['brand_url'];
    	$res->brand_story=$data['brand_story'];

        // if(isset($brand_img)){
        //     $res->brand_img=$brand_img;
        // }
      // dd($res);
    	//添加入库
    	// dd($data);
    	$result=$res->save();
    	// dd($result);
    	//判断
    	if($result){
    		return['code'=>'0','msg'=>'成功'];
    	}else{
    		return['code'=>'1','msg'=>'失败'];
    	}
    }


    public function edit($id){
    	$res=Brand::where('brand_id',$id)->first();
    	// dd($res);
    	return view("admin.brand.update",['res'=>$res]);
    }




    public function update($id){

    	$all=request()->all();
    	// dd($all);
         if(request()->hasFile('brand_img')){
            // echo 111;die;
            $all['brand_img']=$this->upload('brand_img');
        }

        // dd($all);
        $res=Brand::where('brand_id',$id)->update($all);

    	if($res!==false){
    		return redirect('/admin/brand/');
    	}
    }

    public function delete($id){
        $data=new  Brand;
        $data=Brand::find($id);
        $data->brand_del=2;
        $data->save();
        return redirect('/admin/brand');
    }

       public function upload($img){
        if(request()->file($img)->isValid()){
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    /**
     * 图片处理
     */
    public function img( Request $request){
        $fileinfo=$_FILES['Filedata'];
    // dd($fileinfo);
    $tmpname=$fileinfo['tmp_name'];
    $ext=explode(".", $fileinfo['name'])[1];
    // dd($ext);
    $newFile=md5(uniqid()).".".$ext;
    $newFilePath="./upload/".Date("Y/m/d",time());
    if(!is_dir($newFilePath)){
      mkdir($newFilePath,777,true);
    }
    // dd($newFilePath);
    $newFilePath=$newFilePath.$newFile;
    // dd($newFilePath);

    move_uploaded_file($tmpname,$newFilePath);
    $newFilePath=Ltrim($newFilePath,".");
        // dd($newFilePath);

    echo $newFilePath;


        // $arr = $_FILES['Filedata'];
        // // dd($arr);
        // $tmpName = $arr['tmp_name'];
        // $ext  = explode(".",$arr['name'])[1];
        // $newFileName = md5(time()).".".$ext;
        // $newFilePath = "/upload/".$newFileName;
        //      if(!is_dir($newFilePath)){
        //   mkdir($newFilePath,777,true);
        // }
        // // dd($newFilePath);
        // move_uploaded_file($tmpName, $newFilePath);
        // // $newFilePath = trim($newFilePath,".");
        // echo $newFilePath;
    }

}
