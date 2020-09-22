<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class ItemController extends Controller
{
 
    public function index(Request $request){
    	return view("index.item");
    }

}
