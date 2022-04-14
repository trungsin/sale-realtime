<?php

namespace App\Http\Requests;

use App\Models\ItemSpecific;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'name' => ['required', 'string', 'max:200'],
                    'description' => ['required'],
                    'category_id' => ['required'],
                    'account_id'  => ['required'],
                    'price'       => ['required', 'regex:/^\d{1,8}(\.\d{1,2})?$/']
                ];
            }
            case 'PUT':
            {
                $data = $this->request->all();
                $requiredSpecifics = ItemSpecific::required()
                                            ->where('category_id', $data['category_id'])
                                            ->pluck('name_field')->toArray();
                $validates = [
                    'name' => ['required', 'string', 'max:200'],
                    'description' => ['required'],
                    'price' => ['required', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
                    'category_id' => ['required'],
                    'condition_id' => ['not_in:0'],
                    'payment_policy_id' => ['not_in:0'],
                    'return_policy_id' => ['not_in:0'],
                    'postcode' => ['required'],
                    'location' => ['required'],
                ];
                if (!empty($requiredSpecifics)) {
                    $validates['attributes'] = ['array'];
                    foreach ($requiredSpecifics as $key => $item) {
                        $validates["attributes.{$item}"] = ['required'];
                    }
                }
                return $validates;
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
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must be less than 201 characters.',
            'description.required' => 'The description field is required.',
            'category_id.not_in' => 'The category field is required.',
            'price.required' => 'The price field is required.',
            'price.regex' => 'The price is decimal.',
            'account_id.not_in' => 'The account field is required.',
            'vendor_id.not_in' => 'The vendor field is required',
            'payment_policy_id.not_in' => 'The Payment Policy field is required',
            'return_policy_id.not_in' => 'The Return Policy field is required',
            'address_id.not_in' => 'The Address field is required',
        ];
    }
}
