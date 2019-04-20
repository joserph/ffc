<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    protected $table = 'pallets';

    protected $fillable = [
        'number', 'quantity', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
