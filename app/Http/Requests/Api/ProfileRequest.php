<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'unique:users,email', 'max:255'],
            'phone' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'blood_type_id' => ['nullable', 'integer', 'exists:blood_type,id'],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
            'birth_date' => ['nullable', 'date'],
            'last_donation_date' => ['nullable', 'date']
        ];
    }
}
