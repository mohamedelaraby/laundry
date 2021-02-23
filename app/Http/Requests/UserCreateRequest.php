<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' =>'required|max:100|unique:users',
            'user_name' =>'required|unique:users',
            'email' =>'required|email|unique:users',
            'phone' =>'required|min:11|max:20|unique:users',
            'password' =>'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
            'img' =>'required|max:2048',
            'code' =>'required|unique:users',
            // 'notes' =>'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('auth.name-required'),
            'username.required' => trans('auth.username-required'),
            'passoword.required' => trans('auth.password-required'),
            'phone.required' => trans('auth.phone-required'),
            'img.required' => trans('auth.img-required'),
            'email.email' => trans('auth.email-email'),
            'email.required' => trans('auth.email-required'),
            'code.required' => trans('auth.code-required'),
        ];
    }
}
