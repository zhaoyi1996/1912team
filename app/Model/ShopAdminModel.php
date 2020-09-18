<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopAdminModel extends Model
{
    //// // 指定表明 管理员
    protected $table="shop_admin";
    // 指定主键id
    protected $primaryKey="admin_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
    
    
    

}
