<?php

namespace Tests\Feature\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'Jane Buyer',
            'email' => 'jane.buyer@example.com',
            'phone' => '+91 98765 43210',
            'password' => 'Str0ng!Pass',
            'confirm_password' => 'Str0ng!Pass',
            'role' => User::ROLE_BUYER,
            'terms' => 'on',
        ], $overrides);
    }

    public function test_valid_buyer_registration_authenticates_and_creates_no_company(): void
    {
        $response = $this->post(route('register.store'), $this->payload());

        $response->assertRedirect(route('buyer.dashboard'));
        $this->assertAuthenticated();

        $user = User::where('email', 'jane.buyer@example.com')->firstOrFail();
        $this->assertSame('Jane Buyer', $user->name);
        $this->assertSame(User::ROLE_BUYER, $user->role);
        $this->assertSame(User::STATUS_ACTIVE, $user->status);
        $this->assertTrue(Hash::check('Str0ng!Pass', $user->password));
        $this->assertDatabaseCount('companies', 0);
    }

    public function test_valid_owner_registration_creates_exactly_one_company(): void
    {
        $response = $this->post(route('register.store'), $this->payload([
            'full_name' => 'Nilesh Owner',
            'email' => 'nilesh.owner@example.com',
            'role' => User::ROLE_OWNER,
            'company_name' => 'Patel Engineering',
            'city' => 'Ahmedabad',
            'address' => 'Plot 42, GIDC Industrial Estate',
        ]));

        $response->assertRedirect(route('owner.dashboard'));
        $this->assertAuthenticated();

        $user = User::where('email', 'nilesh.owner@example.com')->firstOrFail();
        $this->assertSame(User::ROLE_OWNER, $user->role);
        $this->assertSame(User::STATUS_ACTIVE, $user->status);
        $this->assertTrue(Hash::check('Str0ng!Pass', $user->password));

        $this->assertDatabaseCount('companies', 1);
        $this->assertDatabaseHas('companies', [
            'user_id' => $user->id,
            'company_name' => 'Patel Engineering',
            'phone' => '+91 98765 43210',
            'email' => 'nilesh.owner@example.com',
            'city' => 'Ahmedabad',
            'address' => 'Plot 42, GIDC Industrial Estate',
            'state' => '',
            'pincode' => '',
        ]);
    }

    public function test_duplicate_email_is_rejected(): void
    {
        User::factory()->create(['email' => 'taken@example.com']);

        $this->post(route('register.store'), $this->payload([
            'email' => 'taken@example.com',
        ]))->assertSessionHasErrors('email');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 1);
    }

    public function test_invalid_role_is_rejected(): void
    {
        $this->post(route('register.store'), $this->payload([
            'role' => 'invalid-role',
        ]))->assertSessionHasErrors('role');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_admin_registration_is_rejected(): void
    {
        $this->post(route('register.store'), $this->payload([
            'role' => User::ROLE_ADMIN,
        ]))->assertSessionHasErrors('role');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
        $this->assertDatabaseCount('companies', 0);
    }

    public function test_weak_password_is_rejected(): void
    {
        $this->post(route('register.store'), $this->payload([
            'password' => 'weak',
            'confirm_password' => 'weak',
        ]))->assertSessionHasErrors('password');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_password_confirmation_mismatch_is_rejected(): void
    {
        $this->post(route('register.store'), $this->payload([
            'confirm_password' => 'Different1!',
        ]))->assertSessionHasErrors('password');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_missing_terms_acceptance_is_rejected(): void
    {
        $payload = $this->payload();
        unset($payload['terms']);

        $this->post(route('register.store'), $payload)
            ->assertSessionHasErrors('terms');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_extra_role_status_and_ownership_fields_cannot_escalate_privileges(): void
    {
        $response = $this->post(route('register.store'), $this->payload([
            'status' => User::STATUS_BLOCKED,
            'user_id' => 999,
            'company_user_id' => 999,
            'company_id' => 999,
        ]));

        $response->assertRedirect(route('buyer.dashboard'));

        $user = User::firstOrFail();
        $this->assertSame(User::ROLE_BUYER, $user->role);
        $this->assertSame(User::STATUS_ACTIVE, $user->status);
        $this->assertDatabaseCount('companies', 0);
    }

    public function test_owner_ownership_is_derived_from_the_new_user_not_the_request(): void
    {
        $this->post(route('register.store'), $this->payload([
            'role' => User::ROLE_OWNER,
            'user_id' => 999,
            'company_user_id' => 999,
            'company_name' => 'Owned Company',
            'city' => 'Pune',
            'address' => 'Site 7',
        ]))->assertRedirect(route('owner.dashboard'));

        $user = User::firstOrFail();
        $this->assertDatabaseHas('companies', [
            'user_id' => $user->id,
            'company_name' => 'Owned Company',
        ]);
    }

    public function test_owner_registration_rolls_back_when_company_creation_fails(): void
    {
        $this->withoutExceptionHandling();

        $initialUserCount = User::count();
        $initialCompanyCount = Company::count();
        $email = 'rollback.owner@example.com';
        $trigger = 'fail_company_insert_for_rollback_test';

        DB::unprepared("
            CREATE TRIGGER {$trigger}
            BEFORE INSERT ON companies
            FOR EACH ROW
            WHEN NEW.email = '{$email}'
            BEGIN
                SELECT RAISE(ABORT, 'Simulated company creation failure.');
            END;
        ");

        try {
            $this->post(route('register.store'), $this->payload([
                'full_name' => 'Rollback Owner',
                'email' => $email,
                'role' => User::ROLE_OWNER,
                'company_name' => 'Rollback Co',
                'city' => 'Ahmedabad',
                'address' => 'Rollback Street',
            ]));

            $this->fail('Expected simulated company creation failure was not thrown.');
        } catch (QueryException $exception) {
            $this->assertStringContainsString('Simulated company creation failure.', $exception->getMessage());
        } finally {
            DB::unprepared("DROP TRIGGER IF EXISTS {$trigger};");
        }

        $this->assertGuest();
        $this->assertDatabaseCount('users', $initialUserCount);
        $this->assertDatabaseCount('companies', $initialCompanyCount);
        $this->assertDatabaseMissing('users', ['email' => $email]);
        $this->assertDatabaseMissing('companies', ['email' => $email]);
    }
}
