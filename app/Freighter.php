<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freighter extends Model
{
    protected $table = 'freighters';

    protected $fillable = [
        'name', 'address', 'parish', 'city', 'country', 'phone', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
