<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour_Package extends Model
{
    protected $fillable=[
        'name',
        'distination',
        'duration',
        'price',
        'total_seate',
        'description',
    ];
}
