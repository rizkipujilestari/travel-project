<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_name',
        'route_code',
        'route_address',
        'route_city',
        'route_description',
        'is_active',
    ];
}
