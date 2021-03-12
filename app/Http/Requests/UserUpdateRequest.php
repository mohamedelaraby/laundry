<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        return [
            // 'name' => 'sometimes|nullable|min:4|max:100|unique:users',
            // 'email' => 'sometimes|nullable|email|unique:users',
            // 'password' => 'sometimes|nullable',
            // 'confirmpassword' => 'required_with:password|same:password|min:8|sometimes|nullable',

        ];
    }
}
