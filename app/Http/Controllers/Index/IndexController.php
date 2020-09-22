<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\ShopLtdModdel;
use Illuminate\Http\Request;
use App\Brand;
use App\Model\ShopSlideModel;
class IndexController extends Controller
{

    public function index(){
        $slide=ShopSlideModel::all();
        //dd($slide);
    	return view("index.index",['slide'=>$slide]);
    }

}
