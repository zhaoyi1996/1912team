<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "shop_slide";
    protected $primaryKey = "sli_id";
     
    public $timestamps =  false;
     // 黑名单 所有都允许添加
    protected $guarded = [];
}
