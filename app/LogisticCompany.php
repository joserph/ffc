<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogisticCompany extends Model
{
    protected $table = 'logistic_companies';

    protected $fillable = [
        'name', 'ruc', 'address', 'parish', 'city', 'country', 'phone', 'id_user', 'update_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
