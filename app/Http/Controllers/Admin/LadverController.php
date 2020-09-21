<?
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;
use App\Model\ShopLadverModel as Ladver;
class LadverController extends Controller
{
    // 小广告展示
    public function index(){
        
        
        // $ladvers=$ladver->toArray();
        // // dd($ladvers);
        // $res = array_reduce($ladvers, function ($result, $value) {
        //     return array_merge($result, array_values($value));
        //   }, array());
        // $redis = Redis::hmset('rongxiaoxia',$res);
        // $rediss=Redis::hmget($redis);
        // dd($rediss);

        // 接搜索值
        $la_name = request()->la_name;
        $where = [];
        if($la_name){
            $where[] = ['la_name','like',"%$la_name%"];
        }
        $ladver = Ladver::where($where,'la_del',1)->paginate(2);
        $query = request()->all();
    	return view("admin.ladver.index",['ladver'=>$ladver,'query'=>$query]);
    }
    // 小广告添加展示
    public function create(){
          return view('admin.ladver.create');
      }
  
      // 上传图片
      public function getsun(){
          //文件上传
          $arr = $_FILES['Filedata'];
        //    dd($arr);
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

        //  小广告执行添加
    public function story(request $request){
        // 接视图ajax传来的值
        $la_name = Request()->la_name;
        $la_img = Request()->la_img;
        $la_url = Request()->la_url;
        // 把值转化成数组
        $data = [
            'la_name' => $la_name,
            'la_img' => $la_img,
            'la_url' => $la_url
        ];
        // dd($data);
        // 屏蔽_token
        $post = request()->except(['_token']);
        $post['la_time']=time(); //添加时间
        $res = Ladver::insert($post);
        // dd($res);
        if($res){
            return ['code'=>0000,'msg'=>"公告添加成功"];
        }else{
            return ['code'=>1111,'msg'=>'公告添加失败'];
        }
    } 
    
    // 修改视图
    public function edit($id){
        // 根据id获取一条数据
        $ladver = Ladver::find($id);
        // dd(1234);
        return view('admin.ladver.edit',['ladver'=>$ladver]);
    }

    //执行修改
    public function update(Request $request){
         // 接视图ajax传来的值
         $la_name = Request()->la_name;
         $la_img = Request()->la_img;
         $la_url = Request()->la_url;
         $la_id = Request()->la_id;
         // 把值转化成数组
         $data = [
             'la_name' => $la_name,
             'la_img' => $la_img,
             'la_url' => $la_url
         ];
        // dd($data);
         $res = Ladver::where('la_id',$la_id)->update($data); 
        //  dd($res);
        if($res){
            return ['code'=>0000,'msg'=>'修改成功'];
        }else{
            return ['code'=>0001,'msg'=>'修改失败'];
        }
       
    }

    // 逻辑删除
    public function destroy($id){
        // dd(123);
        $data = New Ladver;
        $data = Ladver::find($id);
        // dd($data);
        $data->la_del=2;
        $res = $data->save();
        // dd($res);
        return redirect('/admin/ladver');

    }

    // ajax删除 --接值
    public function ajaxdel(){
        $id=request()->id; //接ajax传来的值
        // dd($id);
        $id=explode(",",$id);//转化为数组
        // dd($id);

        foreach($id as $k=>$v){
         $res = Ladver::destroy($v);      
        }
      
        // dd($res);
        if($res){
            return['code'=>'0','msg'=>"成功"];
        }else{
            return['code'=>'1','msg'=>"失败"];
        }


    }




}