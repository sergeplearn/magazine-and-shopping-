<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravelista\Comments\Commenter;


class User extends Authenticatable
{
    use Notifiable,Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRoleAttribute($value)
    {
        return [0 => 'user',1 =>'admin',2 =>'super_admin'][$value];
    }


    public function timeintervals():HasMany
    {
        return $this->hasMany(timeinterval::class,'user_id','id');
    }

    public function categorys():HasMany
    {
        return $this->hasMany(category::class,'user_id','id');
    }

    public function postproducts():HasMany
    {
        return $this->hasMany(postproduct::class,'user_id','id');
    }

    public function shop_categorys():HasMany
    {
        return $this->hasMany(shop_category::class,'user_id','id');
    }

    public function shoppings():HasMany
    {
        return $this->hasMany(shopping::class,'user_id','id');
    }
}
