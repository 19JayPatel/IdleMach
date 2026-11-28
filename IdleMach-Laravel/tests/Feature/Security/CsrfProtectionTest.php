<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CsrfProtectionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(PreventRequestForgery::class, TestPreventRequestForgery::class);
    }

    protected function tearDown(): void
    {
        PreventRequestForgery::flushState();

        parent::tearDown();
    }

    public function test_login_store_rejects_missing_csrf_token(): void
    {
        $this->startSession();

        $response = $this->post(route('login.store'), [
            'email' => 'missing@example.com',
            'password' => 'password123!',
        ], [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
    }

    public function test_login_store_rejects_invalid_csrf_token(): void
    {
        $this->startSession();

        $response = $this->post(route('login.store'), [
            'email' => 'invalid@example.com',
            'password' => 'password123!',
            '_token' => 'invalid-token',
        ], [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
    }

    public function test_login_store_accepts_valid_csrf_token_and_reaches_normal_validation(): void
    {
        $this->startSession();

        $response = $this->post(route('login.store'), [
            'email' => 'not-an-email',
            'password' => 'password123!',
            '_token' => csrf_token(),
        ], [
            'Accept' => 'text/html',
        ]);

        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);
    }

    public function test_register_store_rejects_missing_csrf_token(): void
    {
        $this->startSession();

        $response = $this->post(route('register.store'), $this->registrationPayload(), [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
    }

    public function test_register_store_rejects_invalid_csrf_token(): void
    {
        $this->startSession();

        $response = $this->post(route('register.store'), $this->registrationPayload([
            '_token' => 'invalid-token',
        ]), [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
    }

    public function test_register_store_accepts_valid_csrf_token_and_reaches_normal_behavior(): void
    {
        $this->startSession();

        $response = $this->post(route('register.store'), $this->registrationPayload([
            '_token' => csrf_token(),
        ]), [
            'Accept' => 'text/html',
        ]);

        $response->assertRedirect(route('buyer.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_logout_rejects_missing_csrf_token(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->startSession();

        $response = $this->post(route('logout'), [], [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
        $this->assertAuthenticatedAs($user);
    }

    public function test_logout_rejects_invalid_csrf_token(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->startSession();

        $response = $this->post(route('logout'), [
            '_token' => 'invalid-token',
        ], [
            'Accept' => 'text/html',
        ]);

        $response->assertStatus(419);
        $this->assertAuthenticatedAs($user);
    }

    public function test_logout_accepts_valid_csrf_token_and_reaches_normal_behavior(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->startSession();

        $response = $this->post(route('logout'), [
            '_token' => csrf_token(),
        ], [
            'Accept' => 'text/html',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function registrationPayload(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'CSRF Buyer',
            'email' => 'csrf.buyer@example.com',
            'phone' => '+91 98765 43210',
            'password' => 'Str0ng!Pass',
            'confirm_password' => 'Str0ng!Pass',
            'role' => User::ROLE_BUYER,
            'terms' => 'on',
        ], $overrides);
    }
}

class TestPreventRequestForgery extends PreventRequestForgery
{
    protected function runningUnitTests()
    {
        return false;
    }
}
