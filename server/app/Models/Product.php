<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps=false;//set time to false
    protected $fillable=['id','name_product','price','avatar','detail','quantity'];
    protected $primaryKey='id';
    protected $table='product';

}
