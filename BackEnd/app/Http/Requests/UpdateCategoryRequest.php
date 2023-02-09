<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => ['required',
            Rule::unique('categories')->ignore($this->category),
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Đã tồn tại!',
        ];
    }
}
