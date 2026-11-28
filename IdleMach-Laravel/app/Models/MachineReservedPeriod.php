<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: reserved date/time range and reason.
 * Server-assigned: machine_id and status.
 */
#[Fillable([
    'reserved_date',
    'start_time',
    'end_time',
    'reason',
])]
class MachineReservedPeriod extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reserved_date' => 'date',
        ];
    }

    /**
     * Get the machine that owns the reserved period.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
