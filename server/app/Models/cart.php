<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $timestamps=false;//set time to false
    protected $fillable=['id','id_product','id_user','product_qly'];
    protected $primaryKey='id';
    protected $table='cart';
}
