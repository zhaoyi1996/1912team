<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Seller1Controller extends Controller
{
    //
    public function index(){
    	return view("admin.seller1.index");
    }
}
