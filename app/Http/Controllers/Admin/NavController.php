<?
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;
use App\Model\ShopNavModel as Nav;
use App\Model\CategoryModel as Cate;
class NavController extends Controller
{
    // 小广告展示
    public function index(){
           // 接搜索值
           $nav_name = request()->nav_name;
           $where = [];
           if($nav_name){
               $where[] = ['nav_name','like',"%$nav_name%"];
               
           }
           $where[] = ['nav_show','=',1];
           $category = New Cate();
        //    $pageSize =1($cate);
        //    // dd($cate);
        // 两表联查
           $pagesize = config('app.pageSize');
           $data = Nav::leftjoin('shop_category','shop_category.cate_id','=','shop_nav.cate_id')
                        ->where($where)
                        ->paginate(2);
        //    dd($data);
        //    $data=DiscountModel::where($where)
        //         ->where(['shop_discount.is_del'=>1])
        //         ->leftjoin('shop_goods','shop_discount.goods_id','=','shop_goods.goods_id')
        //         ->orderBy("dis_id","asc")
        //         ->paginate(2);
        //    dd($data);
           $query = request()->all();
        return view('admin.nav.index',['data'=>$data,'query'=>$query]);
    }

    public function create(){
        return view('admin.nav.create');
    }

    // 执行添加
    public function story(){
          // 接视图ajax传来的值
          $nav_name = Request()->nav_name;
          $nav_url = Request()->nav_url;
          $nav_weight = Request()->nav_weight;
          // 把值转化成数组
          $data = [
              'nav_name' => $nav_name,
              'nav_url' => $nav_url,
              'nav_weight' => $nav_weight
          ];
        //   dd($data);
          // 屏蔽_token
          $post = request()->except(['_token']);
          $post['nav_time']=time(); //添加时间
          $res = Nav::insert($post);
        //   dd($res);
          if($res){
              return ['code'=>0000,'msg'=>"公告添加成功"];
          }else{
              return ['code'=>1111,'msg'=>'公告添加失败'];
          }
    }


    // 修改视图
    public function edit($id){
        // 根据id获取一条数据
        $nav =Nav::find($id);
        // dd(1234);
        return view('admin.nav.edit',['nav'=>$nav]);
    }
    

    //执行修改
    public function update(Request $request){
        // 接视图ajax传来的值
        $nav_name = Request()->nav_name;
        $nav_url = Request()->nav_url;
        $nav_weight = Request()->nav_weight;
        $nav_id = Request()->nav_id;
        // 把值转化成数组
        $data = [
            'nav_name' => $nav_name,
            'nav_url' => $nav_url,
            'nav_weight' => $nav_weight
        ];
       // dd($data);
        $res = Nav::where('nav_id',$nav_id)->update($data); 
        // dd($res);
        if($res){
            return ['code'=>0000,'msg'=>'修改成功'];
        }else{
            return ['code'=>0001,'msg'=>'修改失败'];
        }
   
    }

    
    // ajax删除 --接值
    public function ajaxdel(){
        $id=request()->id; //接ajax传来的值
        // dd($id);
        $id=explode(",",$id);//转化为数组
        // dd($id);

        foreach($id as $k=>$v){
         $res = Nav::destroy($v);      
        }
      
        // dd($res);
        if($res){
            return['code'=>'0','msg'=>"成功"];
        }else{
            return['code'=>'1','msg'=>"失败"];
        }


    }




   



}



        