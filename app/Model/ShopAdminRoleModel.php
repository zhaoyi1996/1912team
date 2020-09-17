<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopAdminRoleModel extends Model
{
    //// // 指定表明  管理员角色关联表
    protected $table="shop_admin_role";
    // 指定主键id
    protected $primaryKey="admin_user_role_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
