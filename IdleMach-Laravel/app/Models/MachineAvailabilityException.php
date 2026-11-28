<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: exception date, type, time range, and reason.
 * Server-assigned: machine_id.
 */
#[Fillable([
    'exception_date',
    'exception_type',
    'start_time',
    'end_time',
    'reason',
])]
class MachineAvailabilityException extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'exception_date' => 'date',
        ];
    }

    /**
     * Get the machine that owns the availability exception.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
