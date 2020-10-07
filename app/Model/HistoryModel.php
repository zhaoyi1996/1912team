<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $table = 'shop_history';
    protected $primaryKey = 'his_id';
    public $timestamps = false;
}
