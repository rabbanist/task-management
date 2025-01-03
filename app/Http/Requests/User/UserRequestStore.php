<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequestStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->id())],
                'employee_id' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore(auth()->id())],
                'position' => ['nullable', 'string', 'max:255'],
                'role' => ['nullable', 'string', Rule::in(['manager', 'teammate'])],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['nullable', 'string', 'min:8'], 
            ];
    }
}
