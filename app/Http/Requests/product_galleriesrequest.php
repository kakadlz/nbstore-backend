<?php

namespace App\Http\Requests;

use App\Models\product;
use Illuminate\Foundation\Http\FormRequest;

class product_galleriesrequest extends FormRequest
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
            'product_id' => 'required|integer|exists:products,id',
            'photo' => 'require|image',
            'is_default' => 'boolean'
        ];
    }
}
