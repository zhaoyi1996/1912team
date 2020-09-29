<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CategoryModel;
class SeckillController extends Controller
{
    //
    public function index(){

    	$cate_pid = [
            ['pid','=',0]
        ];
        $cate = CategoryModel::where($cate_pid)->get();

    	return view("index.seckill.index",['cate'=>$cate]);
    }
}
