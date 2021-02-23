<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    
     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserDatatable $dataTable)
    {
        return $dataTable->render('users.index');
    }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */
        public function store(UserCreateRequest $request)
        {


        $path = '';

        // Upload category image
        if(request()->hasFile('img')){
            $path = uploadImage('users_photos',$request->img);
        }

        $data =[
            'name' =>$request->name,
            'user_name' =>$request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'img' => $path,
            'code' => bcrypt($request->code),
            'notes' => $request->notes,
            'created_by' =>currentUser()->name,
        ];

        $users =  User::create($data);


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
            $User = User::find($id);
            return view('User.Users.edit',compact('User'),['title'=>trans('User.edit')]);
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
           // Validation rules
           $rules = [
            'name' => 'required|max:65',
            'email' => 'required|email|unique:Users,email,'.$id,
            'password' => 'sometimes|nullable',
        ];

        // Validate User
        $data = $this->validate(request(),$rules,[],[
            'name' => trans('User.form_name'),
            'email' => trans('User.form_email'),
            'password' => trans('User.form_password'),
        ]);

        // Create new User
        $data['name'] = request('name');
        $data['email'] = request('email');
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }

        // Update User data
        User::where('id',$id)->update($data);

        // Session message
        session()->flash('msg',trans('User.record_updated'));

        // Redirect back
        return redirect(User_url('User'));
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

        /**
         * Remove the multi resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function multi_delete()
        {
            // Check if items have multi elements or just one
            if(is_array(request('item'))){
                // If item[] has many destroy all
                User::destroy(request('item'));
            } else {
                // If item[] has one Find that element and delete
                User::find(request('item'))->delete();
            }
            // Session message for success delete
            Session::flash('msg',trans('User.record_deleted'));

            // Redirect back to index
            return redirect('User/User');
        }

}
