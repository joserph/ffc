<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketch extends Model
{
    protected $table = 'sketches';

    protected $fillable = [
        'id_pallet_items', 'position'
    ];

    /*public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }*/

    /*public function farms()
    {
        return $this->hasMany('App\Farm', 'id_farm');
    }*/

    /*public function clients()
    {
        return $this->hasMany('App\Client', 'id_client');
    }*/
}
