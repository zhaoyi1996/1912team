<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopRoleModel extends Model
{
    //// // 指定表明 角色表
    protected $table="shop_role";
    // 指定主键id
    protected $primaryKey="ro_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
