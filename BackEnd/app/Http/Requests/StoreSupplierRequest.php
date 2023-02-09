<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=> 'required|unique:suppliers',
            'address' => 'required',
            'phone' => 'required|unique:suppliers'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'email.required' => 'Không được để trống!',
            'address.required' => 'Không được để trống!',
            'phone.required' => 'Không được để trống!',
            'email.unique' => 'Đã tồn tại!',
        ];
    }
}
