<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Slide;
class CategoryController extends Controller
{
    //后台模块广告类型管理
    public function index(){
    	return view("admin.category.index");
    }

    // 轮播图执行添加
    public function create(){
        // 排除接收**数据
        $post = request()->except(['_token']);
        // dd($post);
        // 文件上传判断
        if (request()->hasFile('goods_img')){
            $post['goods_img'] = upload('goods_img');
        };

    }




}

