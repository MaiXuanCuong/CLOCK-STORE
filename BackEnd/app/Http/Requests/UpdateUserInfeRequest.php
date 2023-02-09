<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'birth_day' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'birth_day.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',

        ];

    }
}
