<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class CooperationController extends Controller
{
    public function index(Request $request){
    	return view("index.cooperation");
    }

    public function sampling(Request $request){
    	return view("index.sampling");
    }

}
