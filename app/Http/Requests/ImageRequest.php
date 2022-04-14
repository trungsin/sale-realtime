<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
                    'file' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096']
                ];
            }
            case 'PUT':
            {
                return [
                    'file' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096']
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'Please choosen a file for product.',
            'name.image' => 'The file selecting is not corrected format of image.',
            'name.mimes' => 'The file selecting is only accept format jpg, png or jpeg.',
            'name.max' => 'The file selecting is size greater than 2MB.',
        ];
    }
}
