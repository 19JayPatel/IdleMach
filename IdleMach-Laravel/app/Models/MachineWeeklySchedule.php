<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'machine_id',
    'day_of_week',
    'start_time',
    'end_time',
    'is_active',
])]
class MachineWeeklySchedule extends Model
{
    /**
     * Get the machine that owns the weekly schedule.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
