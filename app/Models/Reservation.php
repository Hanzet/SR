<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'consultant_id',
        'reservation_date',
        'start_time',
        'end_time',
        'reservation_status',
        'total_amount',
        'payment_status',
        'cancellation_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // belongsTo es uno a uno
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id'); // belongsTo es uno a uno
    }
}
