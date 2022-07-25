<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
//        return [
//            'name' => 'required|unique:roles',
//            'name_bn' => 'required|unique:roles',
//            'permissions' => 'required|array',
//            'permissions.*' => 'integer'
//
//        ];

        return [
            'name' => [
                'required', 'max:255',
                Rule::unique('roles')->ignore(optional($this->role)->id),
            ],
            'name_bn' => [
                'required', 'max:255',
                Rule::unique('roles')->ignore(optional($this->role)->id),
            ],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['integer']

        ];
    }
}
