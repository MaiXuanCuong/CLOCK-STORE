<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'name_customer' => 'required',
            'customer_id' => 'required',
            'phone' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Không được để trống!',
            'province_id.required' => 'Không được để trống!',
            'district_id.required' => 'Không được để trống!',
            'ward_id.required' => 'Không được để trống!',
            'name_customer.required' => 'Không được để trống!',
            'customer_id.required' => 'Không được để trống!',
            'phone.required' => 'Không được để trống!',
        ];
    }
}
