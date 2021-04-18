<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserAuthRequest;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use GeneralTrait;

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
}
