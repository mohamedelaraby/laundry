<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserAuthRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;

    /**
     *  Handle admin login
     *
     * @return response
     */
    public function login(UserAuthRequest $request){

        try{
            //Validation
            $inputs = $request->all();

            $validator = Validator::make($inputs, $request->rules());

            // Login
            if($validator->fails()){
                $code =  $this->returnCodeAccordingToInut($validator);
                return $this->returnValidationError($code,$validator);
            }

            // User credetials
            $credentials = $request->only(['email','password']);
            $token = auth()->guard('admin-api')->attempt($credentials);


            // Check for token
            if(!$token){
                return $this->returnError('E001',trans('auth.userdatanotcorrect'));
            }
            $admin = Admin::find($token);
            

            return $admin;

            // return data
            return $this->returnData('admin',$token,trans('auth.successData'));

        // Return Token
        } catch(\Exception $exception){
            return $this->returnError($exception->getCode(), $exception->getMessage());
        }
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'name' =>'required|max:100|unique:users',
            'email' =>'required|email|unique:users',
            'phone' =>'required|min:11|max:20|unique:users',
            'password' =>'required|min:8',
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    private function messages()
    {
        return [
            'name.required' => trans('auth.name-required'),
            'passoword.required' => trans('auth.password-required'),
            'phone.required' => trans('auth.phone-required'),
            'email.email' => trans('auth.email-email'),
            'email.required' => trans('auth.email-required'),
        ];
    }
}
