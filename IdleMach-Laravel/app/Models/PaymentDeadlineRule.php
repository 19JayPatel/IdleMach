<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'min_amount',
    'max_amount',
    'deadline_minutes',
    'is_active',
])]
class PaymentDeadlineRule extends Model
{
}
