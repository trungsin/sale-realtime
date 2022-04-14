<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:45'],
            'password' => ['required', 'max:45'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
            'email.max' => 'The email field must be less than 46 characters.',
            'email.email' => 'The email field is required.',
            'password.required' => 'The password field is required.',
            'password.max' => 'The password field must be less than 46 characters.',
            'password.min' => 'The password field must be at least 8 characters.',
        ];
    }
}
