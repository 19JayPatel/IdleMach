<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: weekly availability values.
 * Server-assigned: machine_id.
 */
#[Fillable([
    'day_of_week',
    'start_time',
    'end_time',
    'is_active',
])]
class MachineWeeklySchedule extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'day_of_week' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the machine that owns the weekly schedule.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
