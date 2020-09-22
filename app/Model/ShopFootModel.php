<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopFootModel extends Model
{
    protected $table = 'shop_foot';
    protected $primaryKey = 'foot_id';
    public $timestamps = false;
}
