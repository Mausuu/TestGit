<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['id','id_product','id_users','product_qly'];
    protected $primaryKey='id';
    protected $table='cart';
}
