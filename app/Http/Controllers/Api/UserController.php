<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    use ResponseTrait;

     /** @param $usersRepository */
     private $usersRepository;

     public function __construct(UsersRepository $usersRepository)
     {
         $this->usersRepository = $usersRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersRepository->paginate(10);

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            $inputs = $request->all();

            $validator = Validator::make($inputs, $this->rules(),$this->messages());

            if($validator->fails()){
                $code =  $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code,$validator);
            }

        // create new user

        $users = $this->usersRepository->create($inputs);

        return $this->returnData('users',$users,trans('auth-success-addrecord'));

        } catch(\Exception $exception){
            return $this->returnError($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

       $user = $this->isUser($id);

        return $this->returnData('user',$user,trans('auth.found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $inputs = $request->all();

            $validator = Validator::make($inputs, $this->rulesUpdate(),$this->messagesUpdate());

            if($validator->fails()){
                $code =  $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code,$validator);
            }

            $user = $this->usersRepository->findById($id);
           
            // Check for user
            $user = $this->isUser($id);

           // Update user
             $this->usersRepository->updateUser($user,$request);

        return $this->returnSuccessMessage(trans('auth-success-updateRecord'));

        } catch(\Exception $exception){
            return $this->returnError($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            // check for user
             $this->isUser($id);

            $this->usersRepository->delete($id);

            return $this->returnSuccessMessage(trans('auth-success-deleteRecord'));
        } catch(\Exception $exception){
            return $this->returnError($exception->getCode(), $exception->getMessage());
        }
    }



    /**-----------------------------------------------------
     * Facilitators
     * ------------------------------------------------
     */
    /**
     * Check foruser Exists
     *
     * @return 
     */
    private function isUser($id)
    {
        $user =  $this->usersRepository->findById($id);
        if(!$user){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $user;
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
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    private function rulesUpdate()
    {
        return [
            'name' =>
            [
                'string',
                'unique:users',
                'min:6',
                'regex:/^[A-Za-z]+(?:[ _-][A-Za-z]+)*$/'
            ],
            'email' =>'email|unique:users',
            'phone' => 'unique:users|regex:/(20)[0-9]{9}/|min:11',
            'password' =>[
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    private function messagesUpdate()
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
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    private function messages()
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
