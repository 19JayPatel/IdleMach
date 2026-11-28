<?php

namespace App\Models;

use App\Models\Machine;
use App\Models\User;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * User-editable: company profile fields below.
 * Server-assigned: user_id (ownership from the authenticated user).
 */
#[Fillable([
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
    /** @use HasFactory<CompanyFactory> */
    use HasFactory;
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
