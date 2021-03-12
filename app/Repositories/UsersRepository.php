<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\DB;

class UsersRepository 
{
    /**
     * Get all reocrds
     *
     * @param array
     */
    public function all(){
        return DB::table('users')->get();
    }

    /**
     * Get Record By id
     *
     * @param $id
     */
    public function findById($id){

    }


    /**
     * Get Record By Name
     *
     * @param $id
     */
    public function findByName($id){

    }

    /**
     * Store new  Record
     */
   
    public function create($userdata){
        return User::create($userdata);
    }

    /**
     * Update existing Record
     */
    public function update(){

    }

    /**
     * Delete Record By ID
     *
     * @param $id
     */
    public function delete($id){

    }



}
