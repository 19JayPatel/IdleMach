<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Authenticate an existing account.
     */
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $request->ensureIsNotRateLimited();

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            RateLimiter::hit($request->throttleKey(), 60);

            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        /** @var User $user */
        $user = Auth::user();

        $allowedRoles = [
            User::ROLE_ADMIN,
            User::ROLE_OWNER,
            User::ROLE_BUYER,
        ];

        if (! $user->isActive() || ! in_array($user->role, $allowedRoles, true)) {
            $this->rejectInvalidAccount($request);
        }

        RateLimiter::clear($request->throttleKey());
        $request->session()->regenerate();

        return redirect()->route($user->dashboardRoute());
    }

    /**
     * Reject an authenticated account that is not allowed to sign in.
     */
    private function rejectInvalidAccount(LoginRequest $request): never
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        RateLimiter::hit($request->throttleKey(), 60);

        throw ValidationException::withMessages([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}
