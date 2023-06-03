<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'company_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'product_name.required' => '※商品名は必須です',
            'company_name.required' => '※メーカーは必須です',
            'price.required' => '※価格は必須です',
            'stock.required' => '※在庫数は必須です',
        ];
    }
}
