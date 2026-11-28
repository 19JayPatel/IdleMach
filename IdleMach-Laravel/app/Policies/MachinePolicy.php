<?php

namespace App\Policies;

use App\Models\Machine;
use App\Models\User;

class MachinePolicy
{
    /**
     * Determine whether the user can view any machines in an administrative context.
     */
    public function viewAny(User $user): bool
    {
        return $user->isActive() && $user->isAdmin();
    }

    /**
     * Determine whether the user can view a machine.
     */
    public function view(User $user, Machine $machine): bool
    {
        if (! $user->isActive()) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return $this->isOwnerOfMachine($user, $machine);
    }

    /**
     * Determine whether the user can create machines for their own company.
     */
    public function create(User $user): bool
    {
        return $user->isActive()
            && $user->isOwner()
            && $user->company()->exists();
    }

    /**
     * Determine whether the user can update machine details.
     *
     * This is intentionally owner-only; admins moderate through approve/reject.
     */
    public function update(User $user, Machine $machine): bool
    {
        return $this->isOwnerOfMachine($user, $machine);
    }

    /**
     * Determine whether the user can delete machine details.
     *
     * This is intentionally owner-only; admin moderation does not grant deletion.
     */
    public function delete(User $user, Machine $machine): bool
    {
        return $this->isOwnerOfMachine($user, $machine);
    }

    /**
     * Determine whether the user can manage machine-related child records.
     *
     * Child records are governed by the owning machine's company ownership.
     */
    public function manageRelatedRecords(User $user, Machine $machine): bool
    {
        return $this->isOwnerOfMachine($user, $machine);
    }

    /**
     * Determine whether the user can perform administrative moderation.
     *
     * Moderation is separate from detail editing/deletion permissions.
     */
    public function moderate(User $user, Machine $machine): bool
    {
        return $user->isActive() && $user->isAdmin();
    }

    /**
     * Determine whether the user can approve a machine.
     */
    public function approve(User $user, Machine $machine): bool
    {
        return $this->moderate($user, $machine);
    }

    /**
     * Determine whether the user can reject a machine.
     */
    public function reject(User $user, Machine $machine): bool
    {
        return $this->moderate($user, $machine);
    }

    /**
     * Determine whether the user owns the company that owns the machine.
     */
    private function isOwnerOfMachine(User $user, Machine $machine): bool
    {
        if (! $user->isActive() || ! $user->isOwner()) {
            return false;
        }

        $companyId = $user->company()->value('id');

        return $companyId !== null && (int) $machine->company_id === (int) $companyId;
    }
}
