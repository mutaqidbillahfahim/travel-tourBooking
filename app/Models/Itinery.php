<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinery extends Model
{
    protected $fillable=[
    'package_id',
    'day',
    'activity',
    'location',
    
    ];
}
