<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
  
    public $timestamps=false;//set time to false
    protected $fillable=['id','cart_id','tennguoinhan','diachinguoinhan','trangthai','thanhtoan','sdt','ngaydat','quantity'];
    protected $primaryKey='id';
    protected $table='order';

  
}
