<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class AuthRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:user_records,username',
            'email' => 'required|email|unique:user_records,email',
            'phone' => 'nullable|string|max:14|unique:user_records,phone',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name may not be greater than 50 characters',
            'username.required' => 'Username is required',
            'username.string' => 'Username must be a string',
            'username.max' => 'Username may not be greater than 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'phone.max' => 'Phone number may not be greater than 14 characters',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }
}