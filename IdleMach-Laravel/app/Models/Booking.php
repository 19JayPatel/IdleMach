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

/**
 * User-editable: requested machine, schedule, hours, work details, material,
 * quantity, and special requirements.
 * Server-assigned: booking_number, buyer_id, status, pricing, and all
 * lifecycle/payment/deadline fields.
 */
#[Fillable([
    'machine_id',
    'required_date',
    'start_time',
    'end_time',
    'required_hours',
    'work_description',
    'material',
    'quantity',
    'special_requirements',
])]
class Booking extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'required_date' => 'date',
            'required_hours' => 'decimal:2',
            'quantity' => 'decimal:2',
            'hourly_rate' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'accepted_at' => 'datetime',
            'payment_deadline_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'work_started_at' => 'datetime',
            'work_completed_at' => 'datetime',
            'completion_confirmed_at' => 'datetime',
            'disputed_at' => 'datetime',
        ];
    }

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
     * Get the single successful payment that confirms this booking, if any.
     */
    public function successfulPayment(): HasOne
    {
        return $this->hasOne(Payment::class, 'successful_booking_id');
    }

    /**
     * Get the user who cancelled the booking.
     */
    public function cancelledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    /**
     * Get the review for the booking.
     */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
