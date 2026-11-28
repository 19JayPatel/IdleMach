<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use LogicException;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Allow the request only for active users with one of the given roles.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if ($roles === []) {
            throw new LogicException('The role middleware requires at least one allowed role.');
        }

        $validRoles = [
            User::ROLE_ADMIN,
            User::ROLE_OWNER,
            User::ROLE_BUYER,
        ];

        $invalidRoles = array_diff($roles, $validRoles);

        if ($invalidRoles !== []) {
            throw new LogicException(
                'Invalid role configured for role middleware: '.implode(', ', $invalidRoles)
            );
        }

        /** @var User|null $user */
        $user = $request->user();

        // The auth middleware handles guests. This guard prevents a
        // misconfigured route from authorizing a missing user.
        if (! $user instanceof User || ! $user->isActive()) {
            abort(403);
        }

        if (! in_array($user->role, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
