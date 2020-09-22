<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnnouModel extends Model
{
    protected $table = 'shop_annou';
    protected $primaryKey = 'an_id';
    public $timestamps = false;
}
