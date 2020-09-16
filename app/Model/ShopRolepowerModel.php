<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopRolepowerModel extends Model
{
    //// // 指定表明 角色权限关联表
    protected $table="shop_rolepower";
    // 指定主键id
    protected $primaryKey="ropo_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
