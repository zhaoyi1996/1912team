<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopTypeModel extends Model
{
    public $table="shop_type";
    protected $primaryKey="type_id";
    public $timestamps=false;
}
