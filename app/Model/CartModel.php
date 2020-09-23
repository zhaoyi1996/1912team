<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'shop_cart';
    protected $primaryKey = 'car_id';
    public $timestamps = false;
}
