<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Register a new buyer or machine owner account.
     */
    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = DB::transaction(function () use ($data): User {
            // role and status are deliberately not fillable, so they are
            // assigned explicitly from trusted server-side values.
            $user = new User([
                'name' => $data['full_name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $user->role = $data['role'];
            $user->status = User::STATUS_ACTIVE;
            $user->save();

            if ($user->isOwner()) {
                // The owner registration form does not collect state or
                // pincode; they are completed later in the company profile.
                $user->company()->create([
                    'company_name' => $data['company_name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => '',
                    'pincode' => '',
                ]);
            }

            return $user;
        });

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route($user->dashboardRoute());
    }
}
