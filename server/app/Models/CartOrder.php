<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    use HasFactory;
    protected $fillable=['id','id_product','id_users','product_qly'];
    protected $primaryKey='id';
    protected $table='cartorder';

}
