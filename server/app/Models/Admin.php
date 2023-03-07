<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use HasFactory,Authenticatable, CanResetPassword;
    public $timestamps=false;//set time to false
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];
    protected $primaryKey='id';
    protected $table='admin';
}
