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

     
   /**-----------------------------------------------------
     * Facilitators
     * ------------------------------------------------
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 
            [
                'required',
                'string',
                'unique:users',
                'min:6',
                'regex:/^[A-Za-z]+(?:[ _-][A-Za-z]+)*$/'
            ],
            'email' =>'required|email|unique:users',
            'phone' => 'required|unique:users|regex:/(20)[0-9]{9}/|min:11',
            'password' =>[
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
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
            'name.regex' => trans('auth.name-regex'),
            'passoword.required' => trans('auth.password-required'),
            'password.regex' => trans('auth.password-regex'),
            'phone.required' => trans('auth.phone-required'),
            'email.email' => trans('auth.email-email'),
            'email.required' => trans('auth.email-required'),
        ];
    }
}
