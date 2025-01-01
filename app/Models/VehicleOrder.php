<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOrder extends Model
{
    use HasFactory;

    protected $table = 'vehicle_orders';

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'status',
        'created_at',
    ];
}
