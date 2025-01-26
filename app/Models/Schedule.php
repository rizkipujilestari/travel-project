<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'departure_date',
        'departure_time',
        'arrival_date',
        'arrival_time',
        'price',
        'quota',
        'duration',
        'description',
        'is_active',
    ];
}
