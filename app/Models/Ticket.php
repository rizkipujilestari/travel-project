<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'passenger_name',
        'passenger_age',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
