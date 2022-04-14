<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductViaTemplateRequest extends FormRequest
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
            'account_id' => 'required|exists:accounts,id',
            'csv_file' => 'required|file|mimetypes:application/vnd.ms-excel,text/plain,text/csv,text/tsv',
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
            'account_id' => 'account field',
            'csv_file' => 'CSV file',
        ];
    }
}
