<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Company;
use App\Models\MachineAvailabilityException;
use App\Models\MachineImage;
use App\Models\MachineReservedPeriod;
use App\Models\MachineSpecification;
use App\Models\MachineWeeklySchedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * User-editable: machine details, location, and hourly_rate.
 * Server-assigned: company_id, machine_code, and all approval/rejection fields.
 */
#[Fillable([
    'name',
    'machine_type',
    'brand',
    'model',
    'description',
    'address',
    'city',
    'state',
    'pincode',
    'hourly_rate',
])]
class Machine extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'hourly_rate' => 'decimal:2',
            'approved_at' => 'datetime',
            'rejected_at' => 'datetime',
        ];
    }

    /**
     * Get the company that owns the machine.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the admin who approved the machine.
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Get the admin who rejected the machine.
     */
    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    /**
     * Get the images for the machine.
     */
    public function images(): HasMany
    {
        return $this->hasMany(MachineImage::class);
    }

    /**
     * Get the specifications for the machine.
     */
    public function specifications(): HasMany
    {
        return $this->hasMany(MachineSpecification::class);
    }

    /**
     * Get the weekly schedules for the machine.
     */
    public function weeklySchedules(): HasMany
    {
        return $this->hasMany(MachineWeeklySchedule::class);
    }

    /**
     * Get the availability exceptions for the machine.
     */
    public function availabilityExceptions(): HasMany
    {
        return $this->hasMany(MachineAvailabilityException::class);
    }

    /**
     * Get the reserved periods for the machine.
     */
    public function reservedPeriods(): HasMany
    {
        return $this->hasMany(MachineReservedPeriod::class);
    }

    /**
     * Get the bookings for the machine.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
