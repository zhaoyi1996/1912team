<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table="shop";
    public  $primaryKey="id";
    public $timestamps=false;
    //添加
    public function create($data){
        return  $this->insertGetId($data);
    }

}
