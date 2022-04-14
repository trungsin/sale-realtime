<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:80',
            'title' => 'required|string|max:80',
            'condition_id' => 'nullable|exists:conditions,id',
            'description' => 'required|string',
            'item_specifics' => 'nullable|array',
            'format' => 'required|in:FixedPrice',
            'variation_item' => 'nullable|json',
            'payment_policy_id' => 'required|exists:payment_policies,id',
            'fulfillment_policy_id' => 'required|exists:fulfillment_policies,id',
            'return_policy_id' => 'required|exists:return_policies,id',
            'location_country' => 'required|string',
            'location_zip_code' => 'required|integer',
            'location_state' => 'required|string',
        ];

        if ('POST' == $this->method()) {
            $rules = array_merge($rules, [
                'account_id' => 'required|exists:accounts,id',
                'category_id' => 'required|exists:categories,id',
            ]);
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'condition_id' => 'condition field',
            'payment_policy_id' => 'payment policy field',
            'fulfillment_policy_id' => 'fulfillment policy field',
            'return_policy_id' => 'return policy field',
            'location_country' => 'country field',
            'location_zip_code' => 'zip code field',
            'location_state' => 'state field',
        ];
    }
}
