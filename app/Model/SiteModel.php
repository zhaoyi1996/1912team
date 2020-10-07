<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteModel extends Model
{
    protected $table="shop_order_site";
    // 指定主键id
    protected $primaryKey="site_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
