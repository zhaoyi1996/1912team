<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepModel extends Model
{
    public $table="shop_rep";
    protected $primaryKey="rep_id";
    public $timestamps=false;
}
