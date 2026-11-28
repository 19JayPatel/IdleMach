<?php

namespace Tests\Concerns;

use App\Models\User;

trait CreatesUsersWithRoles
{
    protected function createUserWithRole(
        string $role,
        string $status = User::STATUS_ACTIVE,
    ): User {
        $user = User::factory()->create();

        // role and status are intentionally outside the model's fillable
        // attributes, so assign them explicitly for test setup.
        $user->forceFill([
            'role' => $role,
            'status' => $status,
        ])->save();

        return $user;
    }
}
