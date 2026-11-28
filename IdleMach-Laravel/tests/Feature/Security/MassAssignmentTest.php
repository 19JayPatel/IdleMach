<?php

namespace Tests\Feature\Security;

use App\Models\Company;
use App\Models\Machine;
use App\Models\MachineAvailabilityException;
use App\Models\MachineImage;
use App\Models\MachineReservedPeriod;
use App\Models\MachineSpecification;
use App\Models\MachineWeeklySchedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MassAssignmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_role_and_status_are_not_mass_assignable(): void
    {
        $user = $this->createUserWithRole(User::ROLE_BUYER, User::STATUS_ACTIVE);

        $user->fill([
            'name' => 'Changed Name',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_BLOCKED,
        ]);

        $this->assertSame('Changed Name', $user->name);
        $this->assertSame(User::ROLE_BUYER, $user->role);
        $this->assertSame(User::STATUS_ACTIVE, $user->status);
    }

    public function test_company_user_id_is_not_mass_assignable(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $otherUser = $this->createUserWithRole(User::ROLE_OWNER, email: 'other-owner@example.com');
        $company = Company::factory()->for($owner)->create();

        $company->fill([
            'company_name' => 'Updated Company',
            'user_id' => $otherUser->id,
        ]);

        $this->assertSame('Updated Company', $company->company_name);
        $this->assertSame($owner->id, $company->user_id);
    }

    public function test_machine_server_controlled_fields_are_not_mass_assignable(): void
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();
        $otherCompany = Company::factory()->create();
        $admin = $this->createUserWithRole(User::ROLE_ADMIN, email: 'admin@example.com');
        $otherAdmin = $this->createUserWithRole(User::ROLE_ADMIN, email: 'admin2@example.com');

        $machine = Machine::factory()->for($company)->create([
            'machine_code' => 'MCH-ORIGINAL',
            'approval_status' => Machine::APPROVAL_PENDING,
            'operational_status' => Machine::OPERATION_INACTIVE,
            'approved_by' => null,
            'approved_at' => null,
            'rejected_by' => null,
            'rejected_at' => null,
            'rejection_reason' => null,
        ]);

        $approvedAt = now()->subDay();
        $rejectedAt = now();

        $machine->fill([
            'name' => 'Updated Machine',
            'company_id' => $otherCompany->id,
            'machine_code' => 'MCH-TAMPERED',
            'approval_status' => Machine::APPROVAL_APPROVED,
            'operational_status' => Machine::OPERATION_ACTIVE,
            'approved_by' => $admin->id,
            'approved_at' => $approvedAt,
            'rejected_by' => $otherAdmin->id,
            'rejected_at' => $rejectedAt,
            'rejection_reason' => 'Tampered',
        ]);

        $this->assertSame('Updated Machine', $machine->name);
        $this->assertSame($company->id, $machine->company_id);
        $this->assertSame('MCH-ORIGINAL', $machine->machine_code);
        $this->assertSame(Machine::APPROVAL_PENDING, $machine->approval_status);
        $this->assertSame(Machine::OPERATION_INACTIVE, $machine->operational_status);
        $this->assertNull($machine->approved_by);
        $this->assertNull($machine->approved_at);
        $this->assertNull($machine->rejected_by);
        $this->assertNull($machine->rejected_at);
        $this->assertNull($machine->rejection_reason);
    }

    public function test_machine_image_machine_id_is_not_mass_assignable(): void
    {
        [$machine, $otherMachine] = $this->twoMachines();
        $image = new MachineImage([
            'is_primary' => true,
            'sort_order' => 1,
        ]);
        $image->forceFill([
            'machine_id' => $machine->id,
            'image_path' => 'machines/original.jpg',
        ])->save();

        $image->fill([
            'machine_id' => $otherMachine->id,
            'sort_order' => 2,
        ]);

        $this->assertSame($machine->id, $image->machine_id);
        $this->assertSame(2, $image->sort_order);
    }

    public function test_machine_specification_machine_id_is_not_mass_assignable(): void
    {
        [$machine, $otherMachine] = $this->twoMachines();
        $specification = new MachineSpecification([
            'specification_name' => 'Power',
            'specification_value' => '10',
            'unit' => 'kW',
            'sort_order' => 1,
        ]);
        $specification->forceFill(['machine_id' => $machine->id])->save();

        $specification->fill([
            'machine_id' => $otherMachine->id,
            'specification_value' => '20',
        ]);

        $this->assertSame($machine->id, $specification->machine_id);
        $this->assertSame('20', $specification->specification_value);
    }

    public function test_machine_weekly_schedule_machine_id_is_not_mass_assignable(): void
    {
        [$machine, $otherMachine] = $this->twoMachines();
        $schedule = new MachineWeeklySchedule([
            'day_of_week' => 1,
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'is_active' => true,
        ]);
        $schedule->forceFill(['machine_id' => $machine->id])->save();

        $schedule->fill([
            'machine_id' => $otherMachine->id,
            'end_time' => '18:00:00',
        ]);

        $this->assertSame($machine->id, $schedule->machine_id);
        $this->assertSame('18:00:00', $schedule->end_time);
    }

    public function test_machine_availability_exception_machine_id_is_not_mass_assignable(): void
    {
        [$machine, $otherMachine] = $this->twoMachines();
        $exception = new MachineAvailabilityException([
            'exception_date' => '2026-12-01',
            'exception_type' => 'unavailable',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'reason' => 'Maintenance',
        ]);
        $exception->forceFill(['machine_id' => $machine->id])->save();

        $exception->fill([
            'machine_id' => $otherMachine->id,
            'reason' => 'Updated reason',
        ]);

        $this->assertSame($machine->id, $exception->machine_id);
        $this->assertSame('Updated reason', $exception->reason);
    }

    public function test_machine_reserved_period_machine_id_is_not_mass_assignable(): void
    {
        [$machine, $otherMachine] = $this->twoMachines();
        $reservedPeriod = new MachineReservedPeriod([
            'reserved_date' => '2026-12-02',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'reason' => 'Reserved',
        ]);
        $reservedPeriod->forceFill(['machine_id' => $machine->id])->save();

        $reservedPeriod->fill([
            'machine_id' => $otherMachine->id,
            'reason' => 'Updated reserved reason',
        ]);

        $this->assertSame($machine->id, $reservedPeriod->machine_id);
        $this->assertSame('Updated reserved reason', $reservedPeriod->reason);
    }

    private function createUserWithRole(string $role, string $status = User::STATUS_ACTIVE, ?string $email = null): User
    {
        $user = User::factory()->create($email ? ['email' => $email] : []);
        $user->forceFill([
            'role' => $role,
            'status' => $status,
        ])->save();

        return $user;
    }

    /**
     * @return array{0: Machine, 1: Machine}
     */
    private function twoMachines(): array
    {
        $owner = $this->createUserWithRole(User::ROLE_OWNER);
        $company = Company::factory()->for($owner)->create();

        // A single owner can only own one company in current schema (unique user_id),
        // so create a second owner/company for a valid cross-company machine target.
        $otherOwner = $this->createUserWithRole(User::ROLE_OWNER);
        $otherCompany = Company::factory()->for($otherOwner)->create();

        return [
            Machine::factory()->for($company)->create(),
            Machine::factory()->for($otherCompany)->create(),
        ];
    }
}
