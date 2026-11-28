<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(fn (): array => [
                'role' => User::ROLE_OWNER,
                'status' => User::STATUS_ACTIVE,
            ]),
            'company_name' => fake()->company(),
            'gst_number' => null,
            'phone' => fake()->numerify('##########'),
            'email' => fake()->unique()->companyEmail(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'pincode' => fake()->numerify('######'),
            'description' => fake()->optional()->sentence(),
            'logo_path' => null,
        ];
    }
}
