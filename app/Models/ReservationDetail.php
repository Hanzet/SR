<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    protected $table = 'reservations_details';

    protected $fillable = [
        'reservation_id',
        'transaction_id',
        'payer_id',
        'payer_email',
        'payment_status',
        'amount',
        'response_code',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
