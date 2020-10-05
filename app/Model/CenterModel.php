<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CenterModel extends Model
{
    protected $table = 'shop_center';
    protected $primaryKey = 'center_id';
    public $timestamps = false;
}
