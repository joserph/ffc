<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clients()
    {
        return $this->hasMany('App\Client', 'id_user');
    }

    public function loads()
    {
        return $this->hasMany('App\Load', 'id_user');
    }

    public function farms()
    {
        return $this->hasMany('App\Farm', 'id_user');
    }

    public function pallets()
    {
        return $this->hasMany('App\Pallet', 'id_user');
    }

    public function freighter()
    {
        return $this->hasMany('App\Freighter', 'id_user');
    }

    public function logisticcompany()
    {
        return $this->hasMany('App\LogisticCompany', 'id_user');
    }
}
