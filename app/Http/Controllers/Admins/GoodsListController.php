<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
class GoodsListController extends Controller
{
    public function index(){
        $res=GoodsModel::all();
        return view('admins.goodslist.index',['res'=>$res]);
    }
}
