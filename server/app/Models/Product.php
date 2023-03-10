<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps=false;//set time to false
    protected $fillable=['id','name_product','price','avatar','url','detail','quantity'];
    protected $primaryKey='id';
    protected $table='product';
    public function cart(){
        return $this->hasMany(cart::class,'id','id');
    }
}
