<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

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
    public function create(User $user)
    {
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

        dd($request);

        dd($this->UserData($request));

        $users =  User::create($this->UserData($request));

        dd($users);
        // Session message
        session()->flash('add',trans('admin.added_record'));

        // Redirect back
        return response()->json();

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
            $user = User::find($id);

            if(!$user){
                session()->flash('error',trans('auth.not_found'));
                return view('users.index');
            }

            return view('users.edit',compact('user'),['title'=>trans('admin.edit')]);
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
                $language = Language::find($id);
                if(!$language){
                    show_message('error',trans('auth.failed'));
                    return redirect()->route('admin.languages.edit',$id);
                }

            //Update language
            $language->update($request->except("_token"));
            show_message('msg',trans('auth.update'));
            return redirect()->route('admin.languages');

            } catch (Exception $exception){
                    show_message('error',trans('auth.add'));
                    return redirect()->route('admin.languages');
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
            // Find User
            User::find($id)->delete();

            // session message
            session()->flash('msg',trans('User.record_deleted'));

            // Redirect back
            return redirect(User_url('User'));

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
        return Hash::make($request->code);
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
