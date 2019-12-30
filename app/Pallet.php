<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    protected $table = 'pallets';

    protected $fillable = [
        'counter', 'number', 'quantity', 'usda', 'id_load', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function palletitems()
    {
        return $this->hasMany('App\PalletItem', 'id_pallet');
    }

    public function setUsdaAttribute($value)
    {
        $this->attributes['usda'] = ($value == 'on') ? '1' : '0';
    }
}
