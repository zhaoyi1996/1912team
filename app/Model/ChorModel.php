<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChorModel extends Model
{
    protected $table = 'shop_chor';
    protected $primaryKey = 'chor_id';
    public $timestamps = false;
}
