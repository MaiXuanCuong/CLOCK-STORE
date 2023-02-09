<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'type_gender' => 'required',
            'inputFile' => 'required',
            'file_names' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'quantity.required' => 'Không được để trống!',
            'price.required' => 'Không được để trống!',
            'description.required' => 'Không được để trống!',
            'category_id.required' => 'Không được để trống!',
            'brand_id.required' => 'Không được để trống!',
            'supplier_id.required' => 'Không được để trống!',
            'type_gender.required' => 'Không được để trống!',
            'inputFile.required' => 'Không được để trống!',
            'file_names.required' => 'Không được để trống!',
        ];
    }
}
