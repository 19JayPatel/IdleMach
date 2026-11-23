<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'machine_id',
    'exception_date',
    'exception_type',
    'start_time',
    'end_time',
    'reason',
])]
class MachineAvailabilityException extends Model
{
    /**
     * Get the machine that owns the availability exception.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
