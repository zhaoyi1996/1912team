<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //展示
    public function index(){
    	return view("admin.content.index");
    }
       // 公告添加展示
    public function create(){
        // dd(123);
       return view('admin.content.create');
      }


}
