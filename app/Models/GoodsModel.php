<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    // // 指定表明
    protected $table="goods";
    // 指定主键id
    protected $primaryKey="goods_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
//    public function limittiao(){
////        select * from goods;
//
//    }
}
