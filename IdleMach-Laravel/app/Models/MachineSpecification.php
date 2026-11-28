<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: specification fields and sort_order.
 * Server-assigned: machine_id.
 */
#[Fillable([
    'specification_name',
    'specification_value',
    'unit',
    'sort_order',
])]
class MachineSpecification extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    /**
     * Get the machine that owns the specification.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
