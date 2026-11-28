<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;

class CompanyPolicy
{
    /**
     * Determine whether the user can view company information.
     */
    public function view(User $user, Company $company): bool
    {
        if (! $user->isActive()) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return $this->isOwnerOfCompany($user, $company);
    }

    /**
     * Determine whether the user can update company information.
     *
     * Admins may view company information, but owner-management updates are
     * restricted to the owning active owner.
     */
    public function update(User $user, Company $company): bool
    {
        return $this->isOwnerOfCompany($user, $company);
    }

    /**
     * Determine whether the user owns the given company.
     */
    private function isOwnerOfCompany(User $user, Company $company): bool
    {
        return $user->isActive()
            && $user->isOwner()
            && $company->user_id === $user->getKey();
    }
}
