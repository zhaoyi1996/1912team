<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopLadverModel extends Model
{
    //// // 指定表明 权限表
    protected $table="shop_ladver";
    // 指定主键id
    protected $primaryKey="la_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
