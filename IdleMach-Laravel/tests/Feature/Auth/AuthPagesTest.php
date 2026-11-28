<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesUsersWithRoles;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use CreatesUsersWithRoles;
    use RefreshDatabase;

    public function test_public_auth_forms_post_to_real_endpoints_with_csrf_tokens(): void
    {
        $login = $this->get(route('login'));
        $login->assertOk();
        $login->assertSee('action="'.route('login.store').'"', false);
        $login->assertSee('name="_token"', false);

        $register = $this->get(route('register'));
        $register->assertOk();
        $register->assertSee('action="'.route('register.store').'"', false);
        $register->assertSee('name="_token"', false);
    }

    public function test_role_layouts_include_real_logout_forms(): void
    {
        $cases = [
            'admin' => ['/admin/dashboard', 'admin-logout-form', 'btn-confirm-logout'],
            'owner' => ['/owner/dashboard', 'owner-logout-form', 'btn-confirm-owner-logout'],
            'buyer' => ['/buyer/dashboard', 'buyer-logout-form', 'buyer-logout-confirm'],
        ];

        foreach ($cases as $role => [$url, $formId, $buttonId]) {
            $this->actingAs($this->createUserWithRole($role));

            $response = $this->get($url);
            $response->assertOk();
            $response->assertSee('action="'.route('logout').'"', false);
            $response->assertSee('id="'.$formId.'"', false);
            $response->assertSee('form="'.$formId.'"', false);
            $response->assertSee('id="'.$buttonId.'"', false);
        }
    }
}
