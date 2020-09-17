<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'shop_brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;
}
