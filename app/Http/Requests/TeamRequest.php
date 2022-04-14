<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            {
                return [
                    'name' => ['required', 'string', 'max:45'],
                    'description'=> ['string', 'nullable'],
                    'users' => ['required', 'exists:users,id'],
                    'accounts' => ['required', 'exists:accounts,id'],
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => ['required', 'string', 'max:45'],
                    'description'=> ['string', 'nullable'],
                    'users' => ['required', 'exists:users,id'],
                    'accounts' => ['required', 'exists:accounts,id'],
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must be less than 45 characters.',
        ];
    }
}
