<?php

namespace Tests\Feature\Ownership;

use App\Models\Company;
use App\Models\Machine;
use App\Models\User;
use App\Policies\MachinePolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\Concerns\CreatesUsersWithRoles;
use Tests\TestCase;

class MachineOwnershipTest extends TestCase
{
    use CreatesUsersWithRoles;
    use RefreshDatabase;

    public function test_machine_policy_is_discovered_for_machine_model(): void
    {
        $this->assertInstanceOf(MachinePolicy::class, Gate::getPolicyFor(Machine::class));
    }

    public function test_owner_can_view_their_own_machine(): void
    {
        [$owner, $machine] = $this->machineOwnedBy();

        $this->assertTrue($owner->can('view', $machine));
    }

    public function test_owner_cannot_view_another_owners_machine(): void
    {
        [$owner] = $this->machineOwnedBy();
        [, $otherMachine] = $this->machineOwnedBy();

        $this->assertFalse($owner->can('view', $otherMachine));
    }

    public function test_owner_can_update_and_delete_their_own_machine(): void
    {
        [$owner, $machine] = $this->machineOwnedBy();

        $this->assertTrue($owner->can('update', $machine));
        $this->assertTrue($owner->can('delete', $machine));
    }

    public function test_owner_cannot_update_or_delete_another_owners_machine(): void
    {
        [$owner] = $this->machineOwnedBy();
        [, $otherMachine] = $this->machineOwnedBy();

        $this->assertFalse($owner->can('update', $otherMachine));
        $this->assertFalse($owner->can('delete', $otherMachine));
    }

    public function test_owner_cannot_manage_another_owners_machine_related_records(): void
    {
        [$owner] = $this->machineOwnedBy();
        [, $otherMachine] = $this->machineOwnedBy();

        $this->assertFalse($owner->can('manageRelatedRecords', $otherMachine));
    }

    public function test_owner_can_manage_their_own_machine_related_records(): void
    {
        [$owner, $machine] = $this->machineOwnedBy();

        $this->assertTrue($owner->can('manageRelatedRecords', $machine));
    }

    public function test_admin_can_view_machines_across_companies(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);
        [, $machineA] = $this->machineOwnedBy();
        [, $machineB] = $this->machineOwnedBy();

        $this->assertTrue($admin->can('viewAny', Machine::class));
        $this->assertTrue($admin->can('view', $machineA));
        $this->assertTrue($admin->can('view', $machineB));
    }

    public function test_admin_can_perform_approval_rejection_and_moderation_actions(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);
        [, $machine] = $this->machineOwnedBy();

        $this->assertTrue($admin->can('moderate', $machine));
        $this->assertTrue($admin->can('approve', $machine));
        $this->assertTrue($admin->can('reject', $machine));
    }

    public function test_admin_cannot_update_or_delete_machine_details(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);
        [, $machine] = $this->machineOwnedBy();

        $this->assertFalse($admin->can('update', $machine));
        $this->assertFalse($admin->can('delete', $machine));
        $this->assertFalse($admin->can('manageRelatedRecords', $machine));
        $this->assertFalse($admin->can('create', Machine::class));
    }

    public function test_buyer_cannot_perform_owner_management_actions(): void
    {
        $buyer = $this->createUserWithRole(User::ROLE_BUYER);
        [, $machine] = $this->machineOwnedBy();

        $this->assertFalse($buyer->can('view', $machine));
        $this->assertFalse($buyer->can('create', Machine::class));
        $this->assertFalse($buyer->can('update', $machine));
        $this->assertFalse($buyer->can('delete', $machine));
        $this->assertFalse($buyer->can('manageRelatedRecords', $machine));
        $this->assertFalse($buyer->can('moderate', $machine));
        $this->assertFalse($buyer->can('approve', $machine));
        $this->assertFalse($buyer->can('reject', $machine));
    }

    public function test_inactive_owners_cannot_manage_machines(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER, User::STATUS_BLOCKED);
        $company = Company::factory()->for($owner)->create();
        $machine = Machine::factory()->for($company)->create();

        $this->assertFalse($owner->can('view', $machine));
        $this->assertFalse($owner->can('create', Machine::class));
        $this->assertFalse($owner->can('update', $machine));
        $this->assertFalse($owner->can('delete', $machine));
        $this->assertFalse($owner->can('manageRelatedRecords', $machine));
    }

    public function test_machine_scopes_separate_public_visibility_and_bookability(): void
    {
        $pending = Machine::factory()->pending()->inactive()->create();
        $rejected = Machine::factory()->rejected()->inactive()->create();
        $approvedInactive = Machine::factory()->approved()->inactive()->create();
        $approvedActive = Machine::factory()->approved()->active()->create();

        $publicIds = Machine::query()->publiclyApproved()->pluck('id')->all();
        $bookableIds = Machine::query()->bookable()->pluck('id')->all();

        $this->assertNotContains($pending->id, $publicIds);
        $this->assertNotContains($rejected->id, $publicIds);
        $this->assertContains($approvedInactive->id, $publicIds);
        $this->assertContains($approvedActive->id, $publicIds);

        $this->assertNotContains($pending->id, $bookableIds);
        $this->assertNotContains($rejected->id, $bookableIds);
        $this->assertNotContains($approvedInactive->id, $bookableIds);
        $this->assertContains($approvedActive->id, $bookableIds);
    }

    /**
     * @return array{0: User, 1: Machine}
     */
    private function machineOwnedBy(): array
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();
        $machine = Machine::factory()->for($company)->create();

        return [$owner, $machine];
    }
}
