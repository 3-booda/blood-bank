<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'patient_name' => ['required', 'string', 'min:10', 'max:50'],
            'patient_phone' => ['required', 'integer', 'digits_between:5,20'],
            'patient_age' => ['required', 'integer'],
            'city_id' => ['required', 'exists:cities,id'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
            'bag_nums' => ['required', 'integer', 'max:10'],
            'hospita_address' => ['required', 'string'],
            'notes' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'blood_type_id' => 'blood type',
            'city_id' => 'city name',
        ];
    }
}
