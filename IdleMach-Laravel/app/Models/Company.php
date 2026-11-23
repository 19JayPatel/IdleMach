<?php

namespace App\Models;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'company_name',
    'gst_number',
    'phone',
    'email',
    'address',
    'city',
    'state',
    'pincode',
    'description',
    'logo_path',
])]
class Company extends Model
{
    /**
     * Get the user that owns the company.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the machines owned by the company.
     */
    public function machines(): HasMany
    {
        return $this->hasMany(Machine::class);
    }
}
