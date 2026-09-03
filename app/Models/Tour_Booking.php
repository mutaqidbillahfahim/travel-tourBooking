<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour_Booking extends Model
{
    protected $fillable=[
        'traveler_id',
        'package_id',
        'booking_date',
        'number_of_seat',
        'status',
    ];
}
