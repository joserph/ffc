<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceHeader extends Model
{
    protected $table = 'invoice_headers';

    protected $fillable = [
        'id_freighter', 
        'id_load', 
        'id_logistics_company', 
        'bl', 
        'carrier', 
        'invoice', 
        'total_bunches', 
        'total_fulls', 
        'total_pieces',
        'total_stems',
        'total',
        'id_user',
        'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function comercialinvoiceitem()
    {
        return $this->hasMany('App\comercial_invoice_items', 'id_invoiceh');
    }

}
