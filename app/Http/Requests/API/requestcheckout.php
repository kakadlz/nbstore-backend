<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class requestcheckout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'number'=> 'required|max:255',
            'address'=> 'required',
            'transaction_total'=> 'required|integer',
            'transaction_status'=> 'required|integer|in:PENDING,SUCCESS,FAILED',
            'transaction_details'=> 'required|array',
            'transaction_details.*'=> 'integer|exists:products.id',

        ];
    }
}
