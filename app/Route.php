<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = [
        'route_number', 'olt', 'olt_card','olt_card_port'
    ];
}
