<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps=false;//set time to false
    protected $fillable=['id','cat_name'];
    protected $primaryKey='id';
    protected $table='category';
    public function product(){
        return $this->hasMany(Product::class,'id','id');
    }
}
