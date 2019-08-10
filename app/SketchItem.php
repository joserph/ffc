<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SketchItem extends Model
{
    protected $table = 'sketch_items';

    protected $fillable = [
        'id_pallet', 'number', 'number_pallet', 'code', 'position'
    ];
}
