<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        return [
            'user_id' => 'required|exists:users,id',
            'ebay_id' => 'required|alpha_dash',
            'ebay_name' => 'required|alpha_dash',
            'type' => 'required|in:BUSINESS,INDIVIDUAL',
            'market_place_id' => 'required|in:EBAY_AT,EBAY_AU,EBAY_BE,EBAY_CA,EBAY_CH,EBAY_CN,EBAY_CZ,EBAY_DE,EBAY_DK,EBAY_ES,EBAY_FI,EBAY_FR,EBAY_GB,EBAY_GR,EBAY_HK,EBAY_HU,EBAY_ID,EBAY_IE,EBAY_IL,EBAY_IN,EBAY_IT,EBAY_JP,EBAY_MY,EBAY_NL,EBAY_NO,EBAY_NZ,EBAY_PE,EBAY_PH,EBAY_PL,EBAY_PR,EBAY_PT,EBAY_RU,EBAY_SE,EBAY_SG,EBAY_TH,EBAY_TW,EBAY_US,EBAY_VN,EBAY_ZA,EBAY_HALF_US,EBAY_MOTORS_US',
            'access_token' => 'nullable|string',
            'expires_in' => 'nullable|numeric',
            'refresh_token' => 'nullable|string',
            'refresh_token_expires_in' => 'nullable|numeric',
            'token_type' => 'nullable|string',
            'active' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'ebay_id' => 'Account',
            'ebay_name' => 'Username',
            'market_place_id' => 'Market Place',
            'expires_in' => 'Exp Access Token',
            'refresh_token_expires_in' => 'Exp Refresh Token',
        ];
    }
}
