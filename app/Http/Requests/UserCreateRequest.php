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
            'name' =>'required',
            'username' =>'required',
            'email' =>'required|email|unique:users',
            'phone' =>'required',
            'password' =>'required|confirmed',
            'img' =>'required',
            'code' =>'required',
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
            'phone.required' => trans('auth.phone-required'),
            'img.required' => trans('auth.img-required'),
            'email.email' => trans('auth.email-email'),
            'email.required' => trans('auth.password-required'),
        ];
    }
}
