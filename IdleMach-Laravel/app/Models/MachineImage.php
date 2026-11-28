<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User-editable: is_primary and sort_order.
 * Server-assigned: machine_id and image_path (the stored upload result).
 */
#[Fillable([
    'is_primary',
    'sort_order',
])]
class MachineImage extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Get the machine that owns the image.
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
