<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopNavModel extends Model
{
    protected $table = 'shop_nav';
    protected $primaryKey = 'nav_id';
    public $timestamps = false;
}
