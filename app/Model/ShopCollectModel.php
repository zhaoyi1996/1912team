<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopCollectModel extends Model
{
    protected $table = 'shop_collect';
    protected $primaryKey = 'collect_id';
    public $timestamps = false;
}
