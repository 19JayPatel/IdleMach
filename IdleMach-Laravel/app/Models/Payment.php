<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'booking_id',
    'payment_reference',
    'amount',
    'payment_method',
    'transaction_id',
    'status',
    'paid_at',
    'successful_booking_id',
])]
class Payment extends Model
{
    /**
     * Get the booking that the payment belongs to.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
