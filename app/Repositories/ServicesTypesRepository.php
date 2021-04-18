<?php

namespace App\Repositories;

use App\Models\ServiceType;
use Illuminate\Support\Facades\DB;

class ServicesTypesRepository
{
    /**
     * Get all reocrds
     *
     * @param array
     */
    public function all(){
        return DB::table('service_types')->get();
    }

    /**
     * Get Record By id
     *
     * @param $id
     */
    public function findById($id){
        return ServiceType::find($id);
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
    public function create(){

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
