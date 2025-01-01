<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_name',
        'driver_name',
        'supervisor_name',
        'start_date',
        'end_date',
        'purpose',
        'status',
    ];
}
