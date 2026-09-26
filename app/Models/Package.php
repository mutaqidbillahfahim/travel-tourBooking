<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Booking;
use App\Models\Itinery;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination',
        'duration',
        'price',
        'total_seats',
        'description',

    ];
    public function bookings()
    {
        return $this ->hasMany(Booking::class);
    }
    public function itineraris()
    {
        return $this->hasMany(Itinery::class);

    }

}
