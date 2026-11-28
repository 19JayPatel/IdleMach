<?php

namespace Tests\Feature\Ownership;

use App\Models\Company;
use App\Models\User;
use App\Policies\CompanyPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\Concerns\CreatesUsersWithRoles;
use Tests\TestCase;

class CompanyOwnershipTest extends TestCase
{
    use CreatesUsersWithRoles;
    use RefreshDatabase;

    public function test_company_policy_is_discovered_for_company_model(): void
    {
        $this->assertInstanceOf(CompanyPolicy::class, Gate::getPolicyFor(Company::class));
    }

    public function test_owner_can_view_their_own_company(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        $this->assertTrue($owner->can('view', $company));
    }

    public function test_owner_cannot_view_another_owners_company(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $otherOwner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($otherOwner)->create();

        $this->assertFalse($owner->can('view', $company));
    }

    public function test_owner_can_update_their_own_company(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        $this->assertTrue($owner->can('update', $company));
    }

    public function test_owner_cannot_update_another_owners_company(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $otherOwner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($otherOwner)->create();

        $this->assertFalse($owner->can('update', $company));
    }

    public function test_admin_can_view_company_information(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        $this->assertTrue($admin->can('view', $company));
    }

    public function test_admin_cannot_update_company_details_through_owner_management_permission(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        $this->assertFalse($admin->can('update', $company));
    }

    public function test_buyer_cannot_perform_owner_company_management_actions(): void
    {
        $buyer = $this->createUserWithRole(User::ROLE_BUYER);
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        $this->assertFalse($buyer->can('view', $company));
        $this->assertFalse($buyer->can('update', $company));
    }

    public function test_inactive_owners_cannot_manage_their_company(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER, User::STATUS_BLOCKED);
        $company = Company::factory()->for($owner)->create();

        $this->assertFalse($owner->can('view', $company));
        $this->assertFalse($owner->can('update', $company));
    }
}
