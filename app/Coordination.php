<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    protected $table = 'coordinations';

    protected $fillable = [
        'hawb', 
        'id_farm',
        'id_client', 
        'id_load', 
        'pieces',
        'fb',
        'hb',
        'qb',
        'eb', 
        'fulls',    
        'total',
        'id_user',
        'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
