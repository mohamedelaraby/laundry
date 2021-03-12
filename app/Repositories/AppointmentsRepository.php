<?php

namespace App\Repositories;

use App\Models\Appointment;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\DB;

class AppointmentsRepository
{
    /**
     * Get all reocrds
     *
     * @param array
     */
    public function all(){
        return DB::table('appointments')->get();
    }

    /**
     * Get Record By id
     *
     * @param $id
     */
    public function findById($id){
        $appointment = Appointment::find($id);
        return $appointment;
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
    public function update($appointment,$data){
        return  $this->findById($appointment->id)->update($data);
    }

    /**
     * Delete Record By ID
     *
     * @param $id
     */
    public function delete($id){
        return $this->findById($id)->delete();
    }



}
