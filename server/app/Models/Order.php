<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
  
    public $timestamps=false;//set time to false
    protected $fillable=['id','id_user','diachinguoinhan','trangthai','thanhtoan','sdt','sum_cart','email'];
    protected $primaryKey='id';
    protected $table='order';

  
}
