<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'phone' => ['required', 'string'],
            // 'password' => ['required', Password::defaults()],
            'password' => ['nullable']
        ];

        if (Route::current()->getActionMethod() === 'register') {
            array_push($rules['phone'], 'unique:users,phone');
            // array_push($rules['password'], 'confirmed');
            $rules += [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email', 'max:255'],
                'blood_type_id' => ['required', 'integer', 'between:1,8'],
                'city_id' => ['required', 'integer'],
                'birth_date' => ['required', 'date']
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'blood_type_id' => 'blood type',
            'city_id' => 'city name',
        ];
    }
}
