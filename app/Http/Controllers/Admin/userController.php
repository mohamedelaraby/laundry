<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     /** @param $usersRepository */
     private $usersRepository;

     public function __construct(UsersRepository $usersRepository)
     {
         $this->usersRepository = $usersRepository;
     }

     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserDatatable $dataTable)
    {

        return $dataTable->render('users.index',[
            'title' => trans('admin.users'),
            'id' => $dataTable->id,
        ]);
    }


      /**
         * Show create form the specified resource.
         *
         * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function create()
    {
        $user = new User;
        return view('users.create',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $users =  $this->usersRepository->create($this->UserData($request));

        // Session message
        session()->flash('add',trans('admin.added_record'));

        // Redirect back
        return view('users.index');

        }



        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $user =  $this->usersRepository->findById($id);

            if(!$user){
                session()->flash('error',trans('auth.not_found'));
                return view('users.index');
            }

            return view('users.edit',compact('user','id'),['title'=>trans('admin.edit')]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UserUpdateRequest $request, $id)
        {

           
            $user =  $this->usersRepository->findById($id);

    
            if(!$user){
                session()->flash('error',trans('admin.not_found'));
                return redirect()->route('admins.users.edit',$id);
            }

            //Update User
            $userUpdate = $this->usersRepository->update($user,$request);


            session()->flash('add',trans('admin.updated'));
            return redirect()->route('admins.users.index');
            
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
                $user =  $this->usersRepository->findById($id);

                if(!$user){
                    session()->flash('add',trans('admin.notfound'));
                    return redirect()->route('admins.users.index');
                }
    
                //delete user
               $deleteUser = $this->usersRepository->delete($id);
                session()->flash('add',trans('admin.deleted'));
                return redirect()->route('admins.users.index');
    
            } catch (Exception $exception){
                session()->flash('add',trans('admin.notfound'));
                return redirect()->route('admins.users.index');
            }
        

        }

/*
|--------------------------------------------------------------------------
| Facilitators functions
|--------------------------------------------------------------------------
*/


/**
 * Hash user code
 *
 * @param mixed  $request
 *@return string
 */
private function codeHash($request){
    if($request->code){
        return $request->code;
    } else {
        return Str::random(10);
    }
}

/**
 * Upload user image
 *
 * @param mixed  $request
 *@return string
 */
private function uploadUserImage($request){

    if(request()->has('img')){
        return uploadImage('users_photos',$request->img);
    } else {
        return '';
    }
}
    /**
     * Get user data
     *
     * @param mixed  $request
     *@return string
    */
    private function UserData($request){

      
        return [
            'name' =>$request->name,
            'user_name' =>$request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'img' => $this->uploadUserImage($request),
            'code' => $this->codeHash($request),
            'notes' => $request->notes,
            'created_by' =>currentUser()->name,
        ];
    }

}
