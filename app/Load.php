<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $table = 'loads';

    protected $fillable = [
        'name', 'code', 'bl', 'carrier', 'invoice', 'date', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function pallets()
    {
        return $this->hasMany('App\Pallet', 'id_load');
    }

    public function invoiceheader()
    {
        return $this->hasMany('App\InvoiceHeader', 'id_load');
    }

    public function comercialinvoiceitem()
    {
        return $this->hasMany('App\ComercialInvoiceItem', 'id_load');
    }
}
