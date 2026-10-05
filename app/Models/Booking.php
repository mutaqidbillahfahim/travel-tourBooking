<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traveler;
use App\Models\Package;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'traveler_id',
        'package_id',
        'booking_date',
        'number_of_seats',
        'status',
    ];
    public function traveler()
    {
        return $this->belongsTo(Traveler::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
