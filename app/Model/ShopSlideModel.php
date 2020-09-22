<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopSlideModel extends Model
{
    protected $table = "shop_slide";
    protected $primaryKey = "sl_id";
     
    public $timestamps =  false;
     // 黑名单 所有都允许添加
    protected $guarded = [];
}
