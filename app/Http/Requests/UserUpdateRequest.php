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
            'name' =>'required|max:100|unique:users',
            'user_name' =>'required|unique:users',
            'email' =>'required|email|unique:users',
            'phone' =>'required|min:11|max:20|unique:users',
            'password' =>'sometimes|nullable',
            'img' =>'required|max:2048',
            'code' =>'required|unique:users',
        ];
    }
}
