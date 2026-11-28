<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: payment_method (demo selection).
 * Server-assigned: booking_id, payment_reference, amount, transaction_id,
 * status, paid_at, and successful_booking_id.
 */
#[Fillable([
    'payment_method',
])]
class Payment extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    /**
     * Get the booking that the payment belongs to.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the booking confirmed by this successful payment attempt.
     */
    public function successfulBooking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'successful_booking_id');
    }
}
