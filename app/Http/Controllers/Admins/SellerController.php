<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopLtdModdel;
class SellerController extends Controller
{
    public function index(){
        return view('admins.seller.index');
    }

    public function create(Request $request){
//        $ltd_name=$request->post('ltd_name');
//        $ltd_phone=$request->post('ltd_phone');
//        $ltd_tel=$request->post('ltd_tel');
//        $ltd_addrese=$request->post('ltd_addrese');
//        $Itd_att_name=$request->post('Itd_att_name');
//        $Itd_att_qq=$request->post('Itd_att_qq');
//        $Itd_att_tel=$request->post('Itd_att_tel');
//        $Itd_att_email=$request->post('Itd_att_email');
//        $Itd_iness=$request->post('Itd_iness');
//        $Itd_reg=$request->post('Itd_reg');
//        $Itd_mech=$request->post('Itd_mech');
//        $Itd_leg_man=$request->post('Itd_leg_man');
//        $Itd_leg_ide=$request->post('Itd_leg_ide');
//        $Itd_open_name=$request->post('Itd_open_name');
//        $Itd_open_branch=$request->post('Itd_open_branch');
//        $Itd_open_bank=$request->post('Itd_open_bank');
        $data=$request->all();
        $res=ShopLtdModdel::insertGetId($data);
        if($res){
            return view('admins.seller.index');
        }
    }

}
