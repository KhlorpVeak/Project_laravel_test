<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>'sometimes|required|string|max:255',
            'email' =>'sometimes|required|string|email|max:255|unique:users',
            'password' => 'sometimes|nullable|string|min:5',
            'image' => 'sometimes|required|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ];
    }
}
