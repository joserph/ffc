<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercialInvoiceItem extends Model
{
    protected $table = 'comercial_invoice_items';

    protected $fillable = [
        'id_invoiceh', 
        'id_client', 
        'id_farm', 
        'id_load', 
        'description', 
        'hawb', 
        'pieces',
        'hb',
        'qb',
        'eb', 
        'stems', 
        'price',
        'bunches', 
        'fulls',    
        'total',
        'id_user',
        'update_user',
        'stems_p_bunches'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
