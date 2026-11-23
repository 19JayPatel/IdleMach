<?php

namespace App\Models;

use App\Models\BookingDocument;
use App\Models\Machine;
use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'booking_number',
    'machine_id',
    'buyer_id',
    'required_date',
    'start_time',
    'end_time',
    'required_hours',
    'work_description',
    'material',
    'quantity',
    'special_requirements',
    'hourly_rate',
    'total_amount',
    'status',
    'accepted_at',
    'payment_deadline_at',
    'cancelled_at',
    'cancelled_by',
    'cancellation_reason',
    'work_started_at',
    'work_completed_at',
    'completion_confirmed_at',
    'dispute_reason',
    'disputed_at',
])]
class Booking extends Model
{
    /**
     * Get the machine that is booked.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }

    /**
     * Get the user who made the booking.
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Get the documents for the booking.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(BookingDocument::class);
    }

    /**
     * Get the payments for the booking.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the review for the booking.
     */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
