<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name', 'phone', 'address', 'parish', 'city', 'country', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function comercialinvoiceitem()
    {
        return $this->hasMany('App\ComercialInvoiceItem', 'id_client');
    }
}
