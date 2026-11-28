<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\Concerns\CreatesUsersWithRoles;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use CreatesUsersWithRoles;
    use RefreshDatabase;

    /**
     * Every existing dashboard route, grouped by the role that owns it.
     *
     * @return array<string, list<string>>
     */
    private function dashboardRoutes(): array
    {
        return [
            User::ROLE_ADMIN => [
                'admin.dashboard',
                'admin.users',
                'admin.machines',
                'admin.machine-approvals',
                'admin.bookings',
                'admin.payments',
                'admin.reviews',
                'admin.reports',
                'admin.business-rules',
                'admin.profile',
            ],
            User::ROLE_OWNER => [
                'owner.dashboard',
                'owner.company-profile',
                'owner.machines',
                'owner.add-machine',
                'owner.availability',
                'owner.booking-requests',
                'owner.accepted-bookings',
                'owner.ongoing-work',
                'owner.completed-work',
                'owner.earnings',
                'owner.payment-history',
                'owner.reviews',
                'owner.notifications',
                'owner.profile',
            ],
            User::ROLE_BUYER => [
                'buyer.dashboard',
                'buyer.explore-machines',
                'buyer.booking-requests',
                'buyer.accepted-bookings',
                'buyer.ongoing-work',
                'buyer.completed-bookings',
                'buyer.payments',
                'buyer.reviews',
                'buyer.notifications',
                'buyer.profile',
            ],
        ];
    }

    /**
     * @return list<string>
     */
    private function allDashboardRoutes(): array
    {
        return array_merge(...array_values($this->dashboardRoutes()));
    }

    /**
     * @return array<string, string>
     */
    private function expectedRouteUrls(): array
    {
        $routes = [
            'home' => '/',
            'about' => '/about',
            'contact' => '/contact',
            'how-it-works' => '/how-it-works',
            'machines' => '/machines',
            'machine-details' => '/machine-details',
            'login' => '/login',
            'login.store' => '/login',
            'register' => '/register',
            'register.store' => '/register',
            'logout' => '/logout',
        ];

        foreach ($this->dashboardRoutes() as $prefix => $names) {
            foreach ($names as $name) {
                $routes[$name] = '/'.$prefix.'/'.Str::after($name, $prefix.'.');
            }
        }

        return $routes;
    }

    private function assertRouteHasNoRoleMiddleware(string $routeName): void
    {
        $route = Route::getRoutes()->getByName($routeName);
        $this->assertNotNull($route, 'Missing route: '.$routeName);

        foreach ($route->gatherMiddleware() as $middleware) {
            $this->assertStringStartsNotWith('role:', $middleware);
        }
    }

    public function test_guest_is_redirected_to_login_for_every_dashboard_route(): void
    {
        foreach ($this->allDashboardRoutes() as $routeName) {
            $this->get(route($routeName))
                ->assertRedirect(route('login'));
        }
    }

    public function test_each_role_can_access_all_of_its_own_dashboard_pages(): void
    {
        foreach ($this->dashboardRoutes() as $role => $routeNames) {
            $this->actingAs($this->createUserWithRole((string) $role));

            foreach ($routeNames as $routeName) {
                $this->get(route($routeName))->assertOk();
            }
        }
    }

    public function test_users_are_forbidden_from_other_role_dashboard_pages(): void
    {
        foreach ($this->dashboardRoutes() as $actorRole => $ignored) {
            $this->actingAs($this->createUserWithRole((string) $actorRole));

            foreach ($this->dashboardRoutes() as $ownerRole => $routeNames) {
                if ($ownerRole === $actorRole) {
                    continue;
                }

                foreach ($routeNames as $routeName) {
                    $this->get(route($routeName))->assertForbidden();
                }
            }
        }
    }

    public function test_blocked_users_cannot_access_protected_dashboard_pages(): void
    {
        foreach ($this->dashboardRoutes() as $role => $routeNames) {
            $this->actingAs($this->createUserWithRole((string) $role, User::STATUS_BLOCKED));

            foreach ($routeNames as $routeName) {
                $this->get(route($routeName))->assertForbidden();
            }
        }
    }

    public function test_users_with_unexpected_roles_cannot_access_protected_dashboard_pages(): void
    {
        $this->actingAs($this->createUserWithRole('unexpected-role'));

        foreach ($this->allDashboardRoutes() as $routeName) {
            $this->get(route($routeName))->assertForbidden();
        }
    }

    public function test_all_dashboard_routes_have_authentication_and_role_middleware(): void
    {
        foreach ($this->dashboardRoutes() as $role => $routeNames) {
            foreach ($routeNames as $routeName) {
                $route = Route::getRoutes()->getByName($routeName);
                $this->assertNotNull($route, 'Missing route: '.$routeName);

                $middleware = $route->gatherMiddleware();
                $this->assertContains('auth', $middleware);
                $this->assertContains('role:'.$role, $middleware);
            }
        }
    }

    public function test_public_routes_remain_public_and_logout_keeps_only_auth_middleware(): void
    {
        $publicPages = [
            'home',
            'about',
            'contact',
            'how-it-works',
            'machines',
            'machine-details',
            'login',
            'register',
        ];

        foreach ($publicPages as $routeName) {
            $this->assertRouteHasNoRoleMiddleware($routeName);
            $this->assertNotContains(
                'auth',
                Route::getRoutes()->getByName($routeName)->gatherMiddleware()
            );
            $this->get(route($routeName))->assertOk();
        }

        $this->assertRouteHasNoRoleMiddleware('login.store');
        $this->assertRouteHasNoRoleMiddleware('register.store');
        $this->assertRouteHasNoRoleMiddleware('logout');

        $this->assertContains(
            'auth',
            Route::getRoutes()->getByName('logout')->gatherMiddleware()
        );
    }

    public function test_existing_route_names_and_urls_remain_valid(): void
    {
        foreach ($this->expectedRouteUrls() as $name => $path) {
            $this->assertTrue(Route::has($name), 'Missing route name: '.$name);
            $this->assertSame(url($path), route($name));
        }
    }

    public function test_login_registration_and_logout_routes_continue_to_work(): void
    {
        $user = $this->createUserWithRole(User::ROLE_BUYER);

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('buyer.dashboard'));

        $this->assertAuthenticatedAs($user);

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();

        $this->post(route('register.store'), [
            'full_name' => 'New Buyer',
            'email' => 'new.buyer@example.com',
            'phone' => '9876543210',
            'password' => 'Str0ng!Pass',
            'confirm_password' => 'Str0ng!Pass',
            'role' => User::ROLE_BUYER,
            'terms' => 'on',
        ])->assertRedirect(route('buyer.dashboard'));

        $this->assertAuthenticated();
    }
}
