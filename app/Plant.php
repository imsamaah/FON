<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'plant_items';
    protected $fillable = [
        'plant_name'
    ];
}
