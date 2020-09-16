<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrModel extends Model
{
    public $table="shop_attr";
    protected $primaryKey="attr_id";
    public $timestamps=false;
}
