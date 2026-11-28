<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(): User
    {
        return User::factory()->create();
    }

    public function test_authenticated_user_can_log_out_using_post(): void
    {
        $this->actingAs($this->createUser());

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_logout_invalidates_the_session(): void
    {
        $this->actingAs($this->createUser());
        $sessionIdBefore = session()->getId();

        $this->post(route('logout'));

        $this->assertGuest();
        $this->assertNotSame($sessionIdBefore, session()->getId());
    }

    public function test_logout_regenerates_the_csrf_token(): void
    {
        $this->actingAs($this->createUser());
        $tokenBefore = session()->token();

        $this->post(route('logout'));

        $this->assertNotSame($tokenBefore, session()->token());
    }

    public function test_guest_logout_request_is_redirected_to_login(): void
    {
        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
