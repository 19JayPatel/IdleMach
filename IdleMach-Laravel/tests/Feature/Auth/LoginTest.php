<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(
        string $role = User::ROLE_BUYER,
        string $status = User::STATUS_ACTIVE,
        string $email = 'login@example.com',
    ): User {
        $user = User::factory()->create([
            'email' => $email,
            'password' => Hash::make('password123!'),
        ]);

        $user->forceFill([
            'role' => $role,
            'status' => $status,
        ])->save();

        return $user;
    }

    /**
     * @return array<string, string>
     */
    private function credentials(
        string $email = 'login@example.com',
        string $password = 'password123!',
    ): array {
        return [
            'email' => $email,
            'password' => $password,
        ];
    }

    public function test_valid_buyer_credentials_authenticate_and_redirect_to_buyer_dashboard(): void
    {
        $user = $this->createUser(User::ROLE_BUYER);

        $this->post(route('login.store'), $this->credentials())
            ->assertRedirect(route('buyer.dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_valid_owner_credentials_redirect_to_owner_dashboard(): void
    {
        $user = $this->createUser(User::ROLE_OWNER, email: 'owner@example.com');

        $this->post(route('login.store'), $this->credentials('owner@example.com'))
            ->assertRedirect(route('owner.dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_valid_admin_credentials_redirect_to_admin_dashboard(): void
    {
        $user = $this->createUser(User::ROLE_ADMIN, email: 'admin@example.com');

        $this->post(route('login.store'), $this->credentials('admin@example.com'))
            ->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function validRoleDashboards(): array
    {
        return [
            'admin' => [User::ROLE_ADMIN, 'admin.dashboard'],
            'owner' => [User::ROLE_OWNER, 'owner.dashboard'],
            'buyer' => [User::ROLE_BUYER, 'buyer.dashboard'],
        ];
    }

    #[DataProvider('validRoleDashboards')]
    public function test_valid_roles_still_redirect_to_their_own_dashboards(
        string $role,
        string $dashboardRoute,
    ): void {
        $user = $this->createUser($role, email: $role.'@example.com');

        $this->post(route('login.store'), $this->credentials($role.'@example.com'))
            ->assertRedirect(route($dashboardRoute));

        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_password_is_rejected(): void
    {
        $this->createUser();

        $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_unknown_email_is_rejected(): void
    {
        $this->createUser();

        $this->post(route('login.store'), $this->credentials(email: 'unknown@example.com'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_remember_me_sets_the_remember_cookie(): void
    {
        $this->createUser();
        $recallerName = Auth::guard('web')->getRecallerName();

        $response = $this->post(route('login.store'), $this->credentials() + ['remember' => true]);

        $response->assertRedirect(route('buyer.dashboard'));
        $response->assertCookie($recallerName);
        $this->assertAuthenticated();
    }

    public function test_inactive_account_cannot_log_in(): void
    {
        $throttleKey = 'blocked@example.com|127.0.0.1';
        $this->freezeTime();
        RateLimiter::clear($throttleKey);

        $this->createUser(User::ROLE_BUYER, User::STATUS_BLOCKED, 'blocked@example.com');

        $this->post(route('login.store'), $this->credentials('blocked@example.com'))
            ->assertSessionHasErrors([
                'email' => 'These credentials do not match our records.',
            ]);

        $this->assertSame(1, RateLimiter::attempts($throttleKey));
        $this->assertGuest();
    }

    public function test_correct_password_with_invalid_stored_role_returns_generic_error(): void
    {
        $this->createUser('invalid-role');

        $this->post(route('login.store'), $this->credentials())
            ->assertSessionHasErrors([
                'email' => 'These credentials do not match our records.',
            ]);

        $this->assertGuest();
    }

    public function test_invalid_stored_role_login_leaves_no_authenticated_session(): void
    {
        $this->createUser('invalid-role');

        $this->get(route('login'));
        $tokenBefore = session()->token();

        $this->post(route('login.store'), $this->credentials())
            ->assertSessionHasErrors('email');

        $this->assertGuest();
        $this->assertNotSame($tokenBefore, session()->token());

        $this->get(route('buyer.dashboard'))->assertRedirect(route('login'));
    }

    public function test_invalid_stored_role_login_does_not_set_a_remember_cookie(): void
    {
        $this->createUser('invalid-role');
        $recallerName = Auth::guard('web')->getRecallerName();

        $response = $this->post(route('login.store'), $this->credentials() + ['remember' => true]);

        $response->assertSessionHasErrors('email');
        $response->assertCookieMissing($recallerName);
        $this->assertGuest();
    }

    public function test_invalid_stored_role_attempt_is_counted_by_the_rate_limiter(): void
    {
        $this->createUser('invalid-role');
        $throttleKey = 'login@example.com|127.0.0.1';
        $this->freezeTime();
        RateLimiter::clear($throttleKey);

        $this->post(route('login.store'), $this->credentials())
            ->assertSessionHasErrors('email');

        $this->assertSame(1, RateLimiter::attempts($throttleKey));
        $this->assertGuest();
    }

    public function test_invalid_stored_role_attempts_follow_the_five_attempt_lockout(): void
    {
        $this->createUser('invalid-role');
        $throttleKey = 'login@example.com|127.0.0.1';
        $this->freezeTime();
        RateLimiter::clear($throttleKey);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('login.store'), $this->credentials())
                ->assertSessionHasErrors([
                    'email' => 'These credentials do not match our records.',
                ]);
        }

        $expectedMessage = 'Too many login attempts. Please try again in '
            .RateLimiter::availableIn($throttleKey).' seconds.';

        $this->post(route('login.store'), $this->credentials())
            ->assertSessionHasErrors(['email' => $expectedMessage]);

        $this->assertSame(5, RateLimiter::attempts($throttleKey));
        $this->assertGuest();
    }

    public function test_session_id_is_regenerated_after_successful_login(): void
    {
        $this->createUser();

        $this->get(route('login'));
        $sessionIdBefore = session()->getId();

        $this->post(route('login.store'), $this->credentials());

        $this->assertNotSame($sessionIdBefore, session()->getId());
        $this->assertAuthenticated();
    }

    public function test_repeated_failed_attempts_are_rate_limited(): void
    {
        $this->createUser();
        $throttleKey = 'login@example.com|127.0.0.1';
        $this->freezeTime();
        RateLimiter::clear($throttleKey);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'));
        }

        $this->assertSame(5, RateLimiter::attempts($throttleKey));

        $expectedMessage = 'Too many login attempts. Please try again in '
            .RateLimiter::availableIn($throttleKey).' seconds.';

        $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'))
            ->assertSessionHasErrors(['email' => $expectedMessage]);

        $this->assertGuest();
    }

    public function test_blocked_requests_do_not_extend_the_lockout(): void
    {
        $this->createUser();
        $throttleKey = 'login@example.com|127.0.0.1';
        $this->freezeTime();
        RateLimiter::clear($throttleKey);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'));
        }

        $availableInBefore = RateLimiter::availableIn($throttleKey);

        $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'));
        $this->post(route('login.store'), $this->credentials(password: 'WrongPassword1!'));

        $this->assertSame(5, RateLimiter::attempts($throttleKey));
        $this->assertSame($availableInBefore, RateLimiter::availableIn($throttleKey));
        $this->assertGuest();
    }

    public function test_invalid_stored_role_throws_logic_exception_for_dashboard_route(): void
    {
        $user = $this->createUser('invalid-role');

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Unexpected user role: invalid-role');

        $user->dashboardRoute();
    }
}
