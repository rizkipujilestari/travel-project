<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'total_passengers',
        'total_price',
        'payment_method',
        'payment_receipt',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
