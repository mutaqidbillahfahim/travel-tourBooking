<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Package;

class Itinery extends Model
{
    use HasFactory;

    protected $fillable =[
        'package_id',
        'day',
        'activity',
        'location',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
