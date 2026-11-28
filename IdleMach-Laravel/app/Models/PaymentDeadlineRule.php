<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * Admin-configurable business rule fields.
 */
#[Fillable([
    'min_amount',
    'max_amount',
    'deadline_minutes',
    'is_active',
])]
class PaymentDeadlineRule extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'min_amount' => 'decimal:2',
            'max_amount' => 'decimal:2',
            'deadline_minutes' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
