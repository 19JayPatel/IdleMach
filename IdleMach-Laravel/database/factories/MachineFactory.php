<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'machine_code' => 'MCH-'.strtoupper(Str::random(10)),
            'name' => fake()->words(3, true),
            'machine_type' => fake()->randomElement(['CNC', 'Lathe', 'Milling', 'Drilling']),
            'brand' => fake()->optional()->company(),
            'model' => fake()->optional()->bothify('Model-###'),
            'description' => fake()->sentence(),
            'address' => fake()->optional()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'pincode' => fake()->numerify('######'),
            'hourly_rate' => fake()->randomFloat(2, 100, 5000),
            'approval_status' => Machine::APPROVAL_PENDING,
            'operational_status' => Machine::OPERATION_INACTIVE,
            'approved_by' => null,
            'approved_at' => null,
            'rejected_by' => null,
            'rejected_at' => null,
            'rejection_reason' => null,
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (): array => [
            'approval_status' => Machine::APPROVAL_PENDING,
            'approved_by' => null,
            'approved_at' => null,
            'rejected_by' => null,
            'rejected_at' => null,
            'rejection_reason' => null,
        ]);
    }

    public function approved(): static
    {
        return $this->state(fn (): array => [
            'approval_status' => Machine::APPROVAL_APPROVED,
            'approved_by' => User::factory()->state(fn (): array => [
                'role' => User::ROLE_ADMIN,
                'status' => User::STATUS_ACTIVE,
            ]),
            'approved_at' => now(),
            'rejected_by' => null,
            'rejected_at' => null,
            'rejection_reason' => null,
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn (): array => [
            'approval_status' => Machine::APPROVAL_REJECTED,
            'approved_by' => null,
            'approved_at' => null,
            'rejected_by' => User::factory()->state(fn (): array => [
                'role' => User::ROLE_ADMIN,
                'status' => User::STATUS_ACTIVE,
            ]),
            'rejected_at' => now(),
            'rejection_reason' => 'Rejected for testing.',
        ]);
    }

    public function active(): static
    {
        return $this->state(fn (): array => [
            'operational_status' => Machine::OPERATION_ACTIVE,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (): array => [
            'operational_status' => Machine::OPERATION_INACTIVE,
        ]);
    }
}
