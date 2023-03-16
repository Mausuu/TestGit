<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Laravel\Sanctum\HasApiTokens;
class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use HasFactory,Authenticatable, CanResetPassword,HasApiTokens;
    public $timestamps=false;//set time to false
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'url',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey='id';
    protected $table='admin';
}
