<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'machine_id',
    'reserved_date',
    'start_time',
    'end_time',
    'reason',
    'status',
])]
class MachineReservedPeriod extends Model
{
    /**
     * Get the machine that owns the reserved period.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
