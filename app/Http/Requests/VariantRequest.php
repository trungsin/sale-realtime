<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VariantRequest extends FormRequest
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
                    'size_id' => ['not_in:none'],
                    'color_id' => ['not_in:none'],
                    'price' => ['required', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
                    'sku' => ['required'],
                    'quantity' => ['required'],
                ];

                break;
            }
            case 'PUT':
            {

                return [
                    'size_id' => ['not_in:none'],
                    'color_id' => ['not_in:none'],
                    'price' => ['required', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
                    'sku' => ['required'],
                    'quantity' => ['required'],
                ];
                break;
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
            'size_id.not_in' => 'Please choose a size.',
            'color_id.not_in' => 'Please choose a color.',
            'price.required' => 'The price field is required.',
            'price.regex' => 'The price is not correct format decimal.',
            'sku.required' => 'The sku field is required.',
            'quantity.required' => 'The quantity field is required.',
        ];
    }
}
