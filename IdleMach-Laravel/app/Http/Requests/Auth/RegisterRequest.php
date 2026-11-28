<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'string', 'regex:/^[0-9+ ]{7,20}$/'],
            'role' => ['required', 'string', Rule::in([User::ROLE_OWNER, User::ROLE_BUYER])],
            'password' => [
                'required',
                'string',
                Password::min(8)->mixedCase()->numbers()->symbols(),
                'same:confirm_password',
            ],
            'confirm_password' => ['required', 'string'],
            'terms' => ['required', 'accepted'],

            // These fields are only required for the machine owner account type.
            'company_name' => ['nullable', 'required_if:role,owner', 'string', 'max:255'],
            'city' => ['nullable', 'required_if:role,owner', 'string', 'max:255'],
            'address' => ['nullable', 'required_if:role,owner', 'string'],
        ];
    }

    /**
     * Get custom messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'role.in' => 'The selected account type is invalid.',
            'password.same' => 'The password confirmation does not match.',
            'terms.accepted' => 'You must accept the terms and conditions.',
            'company_name.required_if' => 'The company name field is required for a machine owner.',
            'city.required_if' => 'The city field is required for a machine owner.',
            'address.required_if' => 'The company address field is required for a machine owner.',
        ];
    }
}
