<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $table="shop_brand";
    protected $primaryKey="brand_id";
    public $timestamps = false;
}