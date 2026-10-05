<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTravelerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:travelers,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',

    ];
}

public function messages(): array
{
    return [
        'email.unique' => 'A Traveler with this email already exists.',
        'name' => 'name is required.',
    ];
}

}
